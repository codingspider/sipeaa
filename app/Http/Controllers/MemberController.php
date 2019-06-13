<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB; 

class MemberController extends Controller
{
    public function search(){

    	return view ('pages.member_search');
    }

    public function find (Request $request) {

    $text = $request->input('blood_group');

    $patients = DB::table('members')->where('blood_group', 'Like', "$text")->get();

    return view('pages.member_search_result', compact('patients'));

	}

	public function find_job_area(Request $request) { 

    $text = $request->input('job_areas');

    $patients = DB::table('members')->where('job_area_id', 'Like', "$text")->get();


    return view('pages.member_search_result', compact('patients'));


	}

}
