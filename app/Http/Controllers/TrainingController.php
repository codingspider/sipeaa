<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
session_start();

class TrainingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

    	$data = DB::table('trainings_category')->get();

    	return view ('pages.training_create', compact('data'));
    }


     public function add_training(Request $request)
    {       


    $data[] = $request->images;

    $validate = Validator::make($data, [
        'image' => 'required|image|mimes:jpeg,png,jpg,doc|max:5048',
    ]);

   if ($request->hasFile('images')) {
        $image = $request->file('images');
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();
        $destinationPath = public_path('/documents');
        $image->move($destinationPath, $name);

        $data = array();
        $data['course_title'] = $request->course_title;
        $data['training_cat'] = $request->training_cat;
        $data['form_date'] = $request->form_date;
        $data['to_date'] = $request->to_date;
        $data['reg_fee'] = $request->reg_fee;
        $data['last_date'] = $request->last_date;
        $data['description'] = $request->description;
        $data['venue'] = $request->venue;
        $data['images'] = $name;
        $data['user_id'] = $request->user_id;
        
        $success = DB::table('trainings')->insert($data);
        Session::put('message','Training added sucessfully');
        return redirect::back();
    }else{

        Session::put('message','---Something went wrong---');
        return redirect::back();
     
        }

    }
}
