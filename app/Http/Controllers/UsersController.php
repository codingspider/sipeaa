<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;


class UsersController extends Controller
{
    

    public function unactive($id){

        $val = 0;
        DB::table('users')
        ->where('id', $id)
        ->update(['approve'=> $val]);
        Session::put('message','User unactive sucessfully');
        return redirect::to('/user/approval');

    }
    public function active($id){

        $val = 1;
        DB::table('users')
        ->where('id', $id)
        ->update(['approve'=> $val]); 
        Session::put('message','User Active sucessfully');
        return redirect::to('/user/approval');

    }
    public function delete($id){
        {
            DB::table('users')
            ->where('id', $id)
            ->delete();
    
            Session::put('message','User deleted sucessfully');
            return redirect::to('/user/approval');
        }
    }

}
