<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
session_start();

class LibraryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	return view('pages.libray_add');
    }

    
    public function library_upload(Request $request)
    {       


    $data[] = $request->upload_file;

    $validate = Validator::make($data, [
        'upload_file' => 'required|pdf|max:5048',
    ]);

   if ($request->hasFile('images')) {
        $image = $request->file('images');
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();
        $destinationPath = public_path('/documents');
        $image->move($destinationPath, $name);

        $data = array();
        $data['doc_type'] = $request->doc_type;
        $data['description'] = $request->description;
        $data['update_date'] = $request->date;
        $data['doc_file'] = $name;
        $data['user_id'] = $request->user_id;
        $data['agriment_status'] = $request->agreement;
        
        $success = DB::table('librarys')->insert($data);
        Session::put('message','Library added sucessfully');
        return redirect::back();
    }else{

        Session::put('message','---Something went wrong---');
        return redirect::back();
     
        }

    }

    public function library_authorising(){

        $data = DB::table('librarys')->get();

        return view('pages.library_authorization', compact('data'));
    }

    public function library_update_status(Request $request){

            $id = $request->id;

            $success = DB::table('librarys')->where('id',$id)->update(
                [
                  'status' => $request->status,
                  
                ]);
                    if ($success) {
                        return redirect::back()->with('success','Status Updated Successfully !');
                    }else{
                        return redirect::back()->with('danger','Something went wrong! please try again');   
                    }
    
    }

    public function library_delete_status($id){

        $success = DB::table('librarys')->where('id',$id)->delete();
        if ($success) {
            return redirect::back()->with('success','Delete Updated Successfully !');
        }else{
            return redirect::back()->with('danger','Something went wrong! please try again');   
        }
    }

}
