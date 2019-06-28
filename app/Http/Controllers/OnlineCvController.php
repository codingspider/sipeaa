<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OnlineCvController extends Controller
{
    public function cv_create(Request $request){


        $data[] = $request->images;
        $user =$request->user_id;


        $validate = Validator::make($data, [
            'images' => 'required|image|mimes:jpeg,png,jpg,doc|max:5048',
        ]);

       if ($request->hasFile('images')) {
            $image = $request->file('images');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $name);
    
            $data = array();
 
            $data['images'] = $name;
            $data['user_id'] = $user;
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['nationality'] = $request->nationality ;
            $data['na_id'] = $request->na_id ;
            $data['father_name'] = $request->father_name ;
            $data['mother_name'] = $request->mother_name ;
            $data['dob'] = $request->dob ;
            $data['mobile'] = $request->mobile ;
            $data['gender'] = $request->gender ;
            $data['maritial_status'] = $request->maritial_status ;
            $data['present_add'] = $request->present_add ;
            $data['permanent_add'] = $request->permanent_add ;
            $data['job_type'] = $request->job_type ;
            $data['exp_salary'] = $request->exp_salary ;
            $data['level_education'] = $request->level_education ;
            $data['board_education'] = $request->board_education ;
            $data['institiute'] = $request->institiute ;
            $data['company_name'] = $request->company_name ;
            $data['compnay_buisness'] = $request->compnay_buisness ;
            $data['designation'] = $request->designation ;
            $data['compnay_loacation'] = $request->compnay_loacation ;
            $data['from_date'] = $request->from_date ;
            $data['to_date'] = $request->to_date ;
            $data['email'] = $request->email ;
        
            $success = DB::table('online-cv')->insert($data);
            return redirect::back()->with('message','CV Created Successfully');
        }else{
    
            return redirect::back()->with('wrong_msg','---Something went wrong to create CV---');
         
            }
        }

        public function cv_update(Request $request){
            $user =$request->user_id;
            $id = $request->id;

            $success = DB::table('online-cv')->where('id',$id)->update(
                [
                  'first_name' => $request->first_name,
                  'last_name' => $request->last_name,
                  'nationality' => $request->nationality,
                  'na_id' => $request->na_id,
                  'father_name' => $request->father_name,
                  'mother_name' => $request->mother_name,
                  'dob' => $request->dob,
                  'mobile' => $request->mobile,
                  'gender' => $request->gender,
                  'present_add' => $request->present_add,
                  'job_type' => $request->job_type,
                  'exp_salary' => $request->exp_salary,
                  'board_education' => $request->board_education,
                  'compnay_buisness' => $request->compnay_buisness,
                  'designation' => $request->designation,
                  'compnay_loacation' => $request->compnay_loacation,
                  'from_date' => $request->from_date,
                  'to_date' => $request->to_date,
                  'email' => $request->email,
                 
                ]);
                    if ($success) {
                                return redirect::back()->with('message','CV Updated Successfully');
                    }else{
                        return redirect::back()->with('message','Something went wrong! please try again');   
                    }
        
            
            
        }
    
}

