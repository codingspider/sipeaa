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
}
