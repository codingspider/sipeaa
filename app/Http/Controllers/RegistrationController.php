<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\SendMailableRegistration;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMailableMemberRegistration;
session_start(); 


class RegistrationController extends Controller
{
    
    public function employee_index()
    {
        return view('pages.employee_registraion');
    }
    public function member_index()
    {
        return view('pages.registraion');
    }

    public function employe_store (Request $request){

             
        $users = User::where('email', $request->user_id)->get();

        # check if email is more than 1
        if(sizeof($users) > 0){

            return back()->with('danger', 'This email already exists in our database');
        }
            
            $user =$request->user_id;

            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->user_id;
            $data['password'] = Hash::make($request->password);
            $data['user_type'] = 'employee'; 
            


            $users = DB::table('users')
            ->insertGetId($data);


            $data = array();
            $data['company_name'] = $request->co_name;
            $data['contact_person'] = $request->contact_person;
            $data['contact_person_designation'] = $request->designation;
            $data['contact_person_mobile'] = $request->phone;
            $data['contact_person_email'] = $request->email;
            $data['description'] = $request->description; 
            $data['job_area_id'] = $request->job_areas; 
            $data['user_id'] = $users; 

            $customer_id = DB::table('employee')
            ->insertGetId($data);
            

            Session::put('customer_id', $customer_id);
            Session::put('name', $name);

            Mail::send( new SendMailableRegistration ($request));

            return redirect::to('/registration/pages/employee')->with('message', 'You have successfully registered. Please wait for activate your account');
    
        
    }

    
    public function member_store (Request $request){

        $users = User::where('email', $request->user_id)->get();
        $data[] = $request->images;

        # check if email is more than 1
        if(sizeof($users) > 0){
          
            return back()->with('danger', 'This email already exists in our database');
        }
        
        $data = array();
        $data['name'] = $request->first_name;
        $data['email'] = $request->user_id;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = 'member'; 
        

        $user_id = DB::table('users')
        ->insertGetId($data);

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['user_id'] = $request->user_id;
        $data['phone'] = $request->phone;
        $data['blood_group'] = $request->blood_group;
        $data['addmission_year'] = $request->admission_year;
        $data['passing_year'] = $request->passing_year;
        $data['reg_no'] = $request->reg_no; 
        $data['batch_no'] = $request->batch_no; 
        $data['experience_year'] = $request->exp_year; 
        $data['job_area_id'] = $request->job_areas; 
        $data['job_skill'] = $request->job_skill; 
        $data['users_id'] = $user_id; 

        $customer_id = DB::table('members')
        ->insertGetId($data);
        

        Session::put('customer_id', $customer_id);
        Session::put('name', $name);
        
        Mail::send( new SendMailableMemberRegistration ($request));

        return redirect::to('/registration/pages')->with('message', 'You have successfully registered. Please wait for activate your account');
    }


    public function member_approve(){

        return view('pages.member_approve');
    }

    public function employee_approve(){

        return view('pages.employee_approve');
    }


    public function user_employee_profile($id){


        $users = DB::table('users')
        //->join('members', 'members.users_id', '=', 'users.id')
        ->join('employee', 'employee.user_id', '=', 'users.id')
        ->select('users.*',  'employee.*')
        ->where('users.id', $id)
        ->first();



        return view('pages.employe_approve_details', compact('users')); 
    }
    public function user_member_profile($id){


        $users = DB::table('users')
        ->join('members', 'members.users_id', '=', 'users.id')
        ->select('users.*',  'members.*')
        ->where('users.id', $id)
        ->first();


        return view('pages.member_approve_details', compact('users')); 
    }

    public function employe_profile_update(Request $request){
        

            $id = Auth::id();
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;

            $users = DB::table('users')->where('id', $id)
            ->update($data); 

            $data = array();
            $data['company_name'] = $request->co_name;
            $data['contact_person'] = $request->contact_person;
            $data['contact_person_designation'] = $request->designation;
            $data['contact_person_mobile'] = $request->phone;
            $data['contact_person_email'] = $request->email;
           

            $customer_id = DB::table('employee')->where('user_id', $id)
            ->update($data);

                return redirect::back()->with('message', 'Profile Updated Succesfully');
                
            
    }
    public function user_update(Request $request){
        $id = $request->id; 

        $result = DB::table('users')->where('id', $id)
            ->update([
                'reg_no' => $request->reg_no,
                'sipeaa_id' => $request->sipeaa_id,
            ]);

        return response()->json(['success'=>'Data is successfully added']);
    }

}
