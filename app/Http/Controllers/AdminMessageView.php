<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Redirect;

class AdminMessageView extends Controller
{
    public function view_message (){
        $id =request()->get('id');
        $success=DB::table('messages')->where('id',$id)->first(); 
        if($success->notify_status ==0) {
        DB::table('messages')->where('id',$id)->update(['notify_status'=> 1]);
        }

        return Response::json($success);
      
     }
    public function admin_message_sent (Request $request){
        $reciever_id = $request->sender_id;

        $data[] = $request->attachment;
        $id = CRUDBooster::myId();
        $validate = Validator::make($data, [
            'attachment' => 'required|image|mimes:jpeg,png,jpg,doc|pdf|max:5048',
        ]);

       if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
        // Set flash message, render view, etc...
            $succes = DB::table('messages')->insert([
            'body'       => $request->message,
            'subject'    => $request->subject,
            'sent_to_id' => $reciever_id,
            'attachment' => $name,
            'admin_sender_id' => $id,
            'notify_status' => '0',
        ]);   

        return redirect::back()->with('message','Message Sent sucessfully');
        
       } else {
                    $succes = DB::table('messages')->insert([
                        'body'       => $request->message,
                        'subject'    => $request->subject,
                        'sent_to_id' => $reciever_id,
                        'attachment' => $name,
                        'admin_sender_id' => $id,
                        'notify_status' => '0',
                    ]);   

         
    
                return redirect::back()->with('success','Message Sent sucessfully');
          
                
            }
      
     }
}
