<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
use File;

class ProfilePictureController extends Controller
{
  
   public function employe_profile_update_picture (Request $request){

    

    $data= $request->old_images;
    $id= $request->user_id;


    if(Input::hasFile('images'))
                {
                    $usersImage = public_path("files/".$data); // get previous image from folder
                   

                    if (File::exists($usersImage)) { // unlink or remove previous image from folder
                        unlink($usersImage);
                    }
                    $image = $request->file('images');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/files');
                    $image->move($destinationPath, $name);
                }

       
            $data = array();
    
            $data['images'] = $name;


            $users = DB::table('users')->where('id', $id)
            ->update($data); 

            return back();
   }


}
