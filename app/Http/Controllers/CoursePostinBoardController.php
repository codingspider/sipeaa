<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursePostinBoardController extends Controller
{
    public function index(){
        $data = DB::table('cms_users')->get();
    	return view ('pages.course_posting_board', compact('data'));
    }
}
