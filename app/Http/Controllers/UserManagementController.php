<?php

namespace App\Http\Controllers;
use DataTables;
use App\User;

use Illuminate\Http\Request;
use Redirect,Response;
 

class UserManagementController extends Controller
{
    public function index(){
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'action_button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
     
        return view('pages.users_list');
    }
    public function user_management(){
        return Datatables::of(User::query())->make(true)->addColumn('action', 'action_button')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
}
