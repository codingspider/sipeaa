<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
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

        $data = array();
        $data['name'] = $request->co_name;
        $data['email'] = $request->user_id;
        $data['password'] = Hash::make($request->password);

        $customer_id = DB::table('users')
        ->insertGetId($data);

        $data = array();
        $data['company_name'] = $request->co_name;
        $data['contact_person'] = $request->contact_person;
        $data['contact_person_designation'] = $request->designation;
        $data['contact_person_mobile'] = $request->phone;
        $data['contact_person_email'] = $request->email;
        $data['description'] = $request->description; 

        $customer_id = DB::table('employee')
        ->insertGetId($data);
        

        Session::put('customer_id', $customer_id);
        Session::put('name', $name);
        return redirect::to('/registration/pages/employee')->with('message', 'You have successfully registered. Please wait for activate your account');
    }

    
    public function member_store (Request $request){

        $users = User::where('email', $request->user_id)->get();

        # check if email is more than 1
        if(sizeof($users) > 0){
          
            return back()->with('danger', 'This email already exists in our database');
        }


        $data = array();
        $data['name'] = $request->first_name;
        $data['email'] = $request->user_id;
        $data['password'] = md5($request->password);

        $customer_id = DB::table('users')
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
        $data['job_area'] = $request->job_areas; 
        $data['job_skill'] = $request->job_skill; 

        $customer_id = DB::table('members')
        ->insertGetId($data);
        

        Session::put('customer_id', $customer_id);
        Session::put('name', $name);
        return redirect::to('/registration/pages')->with('message', 'You have successfully registered. Please wait for activate your account');
    }
}
