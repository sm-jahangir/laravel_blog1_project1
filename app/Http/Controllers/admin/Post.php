<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    public function listing()
    {
        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        // echo "<pre>";
        // print_r($data);
        return view('/admin/post/list',$data);
    }
    public function submit(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'post_date'=>'required',

        ]);
        // $image = $request->file('image')->store('public/post');
        $image = $request->file('image');
        $ext = $image->extension();
        $file = time(). '.'.$ext;
        $image->storeAs('public/post',$file);

        $data = array(
            'title'=>$request->input('title'),
            'short_description'=>$request->input('short_description'),
            'long_description'=>$request->input('long_description'),
            // 'image'=>$image;
            'image'=>$file,
            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        // echo "<pre>";
        // print_r($data);

        DB::table('posts')->insert($data);
        $request->session()->flash('msg', 'Data Saved');
        return redirect('/admin/post-list');

    }
    public function delete(Request $request, $id)
    {
       DB::table('posts')->where('id',$id)->delete();
       $request->session()->flash('msg','Data Deleted');
       return redirect('admin/post-list');
    }
    public function edit(Request $request, $id)
    {
        $data['result']=DB::table('posts')->where('id',$id)->get();
        // return view('admin/post-edit',$data);

        return view('admin/post/edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'image'=>'mimes:jpg,jpeg,png',
            'post_date'=>'required',
        ]);
        $data = array(
            'title'=>$request->input('title'),
            'short_description'=>$request->input('short_description'),
            'long_description'=>$request->input('long_description'),
            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s'),
        );

        if ($request->hasfile('image')) {


            $image = $request->file('image');
            $ext = $image->extension();
            $file = time(). '.'.$ext;
            $image->storeAs('public/post',$file);
            // $data['image']->$file;
            $data['image']=$file;


        }

        DB::table('posts')->where('id', $id)->update($data);
        $request->session()->flash('msg', 'Data Updated');
        return redirect('/admin/post-list');
    }
}
