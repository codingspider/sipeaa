<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class MessageController extends Controller
{
    public function member_sendMessage(Request $request)
    {
        $data[] = $request->attachment;
        $id = Auth::id();


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
            'sent_to_id' => $request->sent_to_id,
            'sent_to_id_admin' => $request->sent_to_id_admin,
            'attachment' => $name,
            'sender_id' => $id,
            'notify_status' => '0',
        ]);   
        return redirect::back()->with('message','Message Sent sucessfully');
        
       } else {
                    $succes = DB::table('messages')->insert([
                        'body'       => $request->message,
                        'subject'    => $request->subject,
                        'sent_to_id' => $request->sent_to_id,
                        'sent_to_id_admin' => $request->sent_to_id_admin,
                        'attachment' => $name,
                        'sender_id' => $id,
                        'notify_status' => '0',
                    ]);   

         
    
                return redirect::back()->with('message','Message Sent sucessfully');
          
                
            }
    }
    public function employee_sendMessage(Request $request)
    {
        $data[] = $request->attachment;
        $id = Auth::id();


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
            'sent_to_id' => $request->sent_to_id,
            'sent_to_id_admin' => $request->sent_to_id_admin,
            'attachment' => $name,
            'sender_id' => $id,
            'notify_status' => '0',
        ]);   
        return redirect::back()->with('message','Message Sent sucessfully');
        
       } else {
                    $succes = DB::table('messages')->insert([
                        'body'       => $request->message,
                        'subject'    => $request->subject,
                        'sent_to_id' => $request->sent_to_id,
                        'sent_to_id_admin' => $request->sent_to_id_admin,
                        'attachment' => $name,
                        'sender_id' => $id,
                        'notify_status' => '0',
                    ]);   

         
    
                return redirect::back()->with('message','Message Sent sucessfully');
          
                
            }
    }
    public function admin_users(Request $request)
    {

            
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

    public function all_unread_message(){

        $unread_messages = DB::table('messages')->where('sent_to_id', Auth::id())->where('notify_status', 0)->get();
       return view('pages.members_profile', compact('unread_messages'));
    }

    public function all_read_message($id){


           
            $data = DB::table('messages')->where('id',$id)->update(
                [
                  'notify_status' => 1,
                ]);
                
            $succes = DB::table('messages')->where('id',$id)->first();

                 
            return view('pages.all_unread_messages', compact('succes'));
                    
    }

    public function all_message(){

        return view ('pages.all_messages_view_admin');
    }

    public function getUsers($id) {


        $design = DB::table('users')->where('id',$id)->first();  
    
        return Response::json($design);
    }

    public function updateInbox (Request $request){
        $mId = $request->msgId;
        $update = DB::table('messages')
        ->where('id',$mId)
        ->update([
          'notify_status' => 1
        ]);
        if($update){
          echo "Status Update successfully";
        }else {
            echo "something went wrong";
        }
      }
    public function all_message_view (Request $request){
       return 'ok';
      }
   
}
