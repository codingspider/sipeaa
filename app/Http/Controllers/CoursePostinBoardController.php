<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursePostinBoardController extends Controller
{
    public function index(){

    	return view ('pages.course_posting_board');
    }
}
