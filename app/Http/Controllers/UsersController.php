<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Mail\SendMailableSuccess;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailableSuccessEmail;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    

    public function unactive(Request $request){

        $id = $request->user_id;
        $email = $request->email;

        DB::table('users')
        ->where('id', $id)
        ->update(['approve'=> 0]); 
        Session::put('message','User Deactived sucessfully');
        Mail::send( new SendMailableSuccess ($request));
        return back();
 
  
    }
    public function active(Request $request){
        $id = $request->user_id;
        $email = $request->email;

        DB::table('users')
        ->where('id', $id)
        ->update(['approve'=> 1]); 
        Session::put('message','User Activated sucessfully');
        Mail::send( new SendMailableSuccessEmail ($request));
        return back();

    }
    public function delete($id){
        {
            DB::table('users')
            ->where('id', $id)
            ->delete();
    
            Session::put('message','User deleted sucessfully');
            return back();
        }
    }

}
