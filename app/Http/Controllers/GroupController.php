<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Groups;
use Session;
session_start(); 


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){

        return view ('pages.group_index');
    }
    public function create_group (Request $request){

        $userId = $request->user_id;

        $data = $this->validate($request, [
            'name'=>'required',
            'description'=> 'required',
            'short_description'=> 'required',
      
        ]);

        $group = Groups::create($userId, $data);

        return view ('pages.group_index')->with('message', 'Group has been created Successfully');
    }
}
