<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrainingCartController extends Controller
{
    public function details($id){

    	$data = DB::table('trainings')->where('id', $id)->first();

    	return view ('pages.training_details', compact('data'));
    }
}
