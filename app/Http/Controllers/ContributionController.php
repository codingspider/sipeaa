<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class ContributionController extends Controller
{
    public function index(){

    	return view ('pages.contribution_index');
    }

    public function make_contribution(Request $request){

    	$data = array();
        $data['members_name'] = $request->members;
        $data['payment_date'] = $request->amount;
        $data['payment_amount'] = $request->date;
        
        $users = DB::table('contributions')
        ->insert($data);

    	return redirect::back()->with('message', 'You have successfully added the amount');
    }
}
