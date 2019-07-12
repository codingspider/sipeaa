<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class BlogAdminController extends Controller
{
    public function blog_admin_view(){
        return view('pages.blog_admin_list');
    }


    public function blog_admin_create (Request $request){ 
        $val = 1;
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['approve'] =$val; 
        $data['admin'] = $val; 


        $user_id = DB::table('users')
        ->insert($data);

        return redirect::back()->with('success', 'Admin Added to the database');
    }

    public function blog_admin_delete($id){
        $val = 0;
        $data = array();
        //$data['approve'] = $val;
        $data['admin'] = $val;

        $users = DB::table('users')->where('id', $id)->update($data);

        return redirect::back()->with('success', 'Admin cancel succesfully');
    
    }


    public function blog_admin_active ($id){
        $val = 1;
        $data = array();
        //$data['approve'] = $val;
        $data['admin'] = $val;

        $users = DB::table('users')->where('id', $id)->update($data);

        return redirect::back()->with('success', 'Admin active succesfully');
    }
}
