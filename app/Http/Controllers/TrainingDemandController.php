<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Mail\MailNotify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
session_start();


class TrainingDemandController extends Controller
{
    public function index(){


    	return view ('pages.training_demand');
    }

    public function training_demand(Request $request)
    {       


        $data = array();
        $data['traing_need'] = $request->training_need;
        $data['demand_date'] = $request->form_date;
        $data['description'] = $request->description;
       
        
        $success = DB::table('training_demands')->insert($data);
        Session::put('message','Training added sucessfully');
        
        Mail::send( new MailNotify ($request));
        return redirect::back();
    

    }

    public function training_list(){

        $data = DB::table('trainings')->orderBy('id', 'desc')->get();
        return view ('pages.all_training', compact('data'));
    }
}
