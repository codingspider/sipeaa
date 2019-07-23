<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
session_start();

class TrainingCartController extends Controller
{
    public function details($id){

    	$data = DB::table('trainings') ->join('users', 'users.id', '=', 'trainings.trainer_id')

        ->select('trainings.*', 'users.name as uname')->where('trainings.id', $id)->first();

    	return view ('pages.training_details', compact('data'));
    }



    public function training_list(){

        $data = DB::table('trainings')
             ->join('trainings_category', 'trainings_category.id', '=', 'trainings.training_cat')
             ->join('users', 'users.id', '=', 'trainings.trainer_id')
            ->select('trainings.*', 'trainings_category.name as cname', 'users.name as uname')

            ->get();


    	return view ('pages.training_details_list', compact('data'));
    }
    

    public function training_delete($id){

        $data = DB::table('trainings')->where('id', $id)->delete();
       
    	return back()->with('success', 'Deleted Training Succesfuly');
    }

    
    public function training_edit($id){
        $data = DB::table('trainings')->where('id', $id)->first();

        return view('pages.training_edit_page', compact('data'));
        
    }


    public function training_update(Request $request){

        $data[] = $request->images;
        $id = $request->id;
        $user_id = $request->user_id;


        $validate = Validator::make($data, [
            'image' => 'required|image|mimes:jpeg,png,jpg,doc|max:5048',
        ]);
    
       if ($request->hasFile('images')) {
            $image = $request->file('images');
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $destinationPath = public_path('/documents');
            $image->move($destinationPath, $name);

            
            $success = DB::table('trainings')->where('id', $id)->update([
               'course_title' => $request->course_title,
               'training_cat' => $request->training_cat,
               'form_date' => $request->form_date,
               'to_date' => $request->to_date,
               'reg_fee' => $request->reg_fee,
               'last_date' => $request->last_date,
               'description' => $request->description,
               'venue' => $request->venue,
               'images' => $name,
               'user_id' => $user_id,
               'trainer_id' => $request->trainer_id,
                
            ]);
            
            Session::put('message','Training Updated sucessfully');
            return back();
            
        }else{
            $success = DB::table('trainings')->where('id', $id)->update([
                'course_title' => $request->course_title,
                'training_cat' => $request->training_cat,
                'form_date' => $request->form_date,
                'to_date' => $request->to_date,
                'reg_fee' => $request->reg_fee,
                'last_date' => $request->last_date,
                'description' => $request->description,
                'venue' => $request->venue,
                'user_id' => $user_id,
                'trainer_id' => $request->trainer_id
            ]);
    
            Session::put('message','Training Updated sucessfully');
            return back();
         
            }
    
    }
        
    
}
