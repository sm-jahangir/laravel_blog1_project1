<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function home()
    {
        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        return view('/frontend/index',$data);
    }
    public function post($id)
    {
        $data['result'] = DB::table('posts')->where('id', $id)->get();
        return view('/frontend/post', $data);
    }
}
