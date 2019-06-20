<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
session_start();
class CvController extends Controller
{
    public function cv_upload(Request $request){

        $data[] = $request->images;
        $user =$request->user_id;


        $validate = Validator::make($data, [
            'image' => 'required|image|mimes:jpeg,png,jpg,doc|max:5048',
        ]);

       if ($request->hasFile('upload_file')) {
            $image = $request->file('upload_file');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
    
            $data = array();
 
            $data['upload_file'] = $name;
            $data['user_id'] = $user;
        
            
            $success = DB::table('cv')->insert($data);
        return redirect::back()->with('message','Library added sucessfully');
    }else{

        return redirect::back()->with('wrong_msg','---Something went wrong---');
     
        }
    }

    public function cv_delete($id)
            {

                $collection = DB::table('cv')->where('id', $id)->delete();

                return redirect::back()->with('message','CV deleted sucessfully');
      }
}
