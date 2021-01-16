<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('/admin/login');
    }
    public function login_submit(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $result = DB::table('users')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get();
        if (isset($result[0]->id)) {
            if ($result[0]->status==1) {
               $request->session()->put('BLOG_USER_ID', $result[0]->id);
               $request->session()->put('BLOG_USER_NAME', $result[0]->name);
               $request->session()->put('BLOG_USER_EMAIL', $result[0]->email);
               return redirect('admin/dashboard');
            } else {
               $request->session()->flash('msg', 'You are Blog');
               return redirect('/admin/login');
            }

        } else {
             $request->session()->flash('msg', 'Please Enter Valid Login Details');
             return redirect('/admin/login');
        }

    }
}
