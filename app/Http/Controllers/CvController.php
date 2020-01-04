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

      public function resume_edit()
            {

                // $collection = DB::table('cv')->where('id', $id)->delete();

                $personaldetails = DB::table('resumes')->whereNotNull('first_name')->first();
        $address = DB::table('resumes')->whereNotNull('present_add')->get();
        $career = DB::table('resumes')->whereNotNull('present_sallary')->get();
        $prefer_jobs = DB::table('resumes')->whereNotNull('job_location')->get();
        $career_summery = DB::table('resumes')->whereNotNull('summery')->get();
        $education_level = DB::table('resumes')->whereNotNull('education_level')->get();
        $training_title = DB::table('resumes2')->whereNotNull('training_title')->get();
        $certificate = DB::table('resumes2')->whereNotNull('certificate')->get();
        $employments = DB::table('resumes2')->whereNotNull('com_name')->get();
        $others_employments = DB::table('resumes2')->whereNotNull('batch')->get();
        $specials = DB::table('resumes2')->whereNotNull('skill')->get();
        $languages = DB::table('resumes2')->whereNotNull('language')->get();
        $reference = DB::table('resumes')->whereNotNull('ref_name')->get();
        $gender = DB::table('genders')->get();

                return view('pages.edit_resume', compact('personaldetails', 'address', 'career', 'prefer_jobs','career_summery','education_level','training_title','certificate', 'employments', 'others_employments', 'specials', 'languages', 'reference', 'gender')); 
      }
}
