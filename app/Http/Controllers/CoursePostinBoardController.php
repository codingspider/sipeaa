<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoursePostinBoardController extends Controller
{
    public function index(){
        
        $item = DB::table('users')
        ->join('employee', 'employee.user_id', '=', 'users.id')
           
        ->select('users.*', 'employee.*' )
        ->where('users.id', Auth::id())
            
            ->first();

    	return view ('pages.course_posting_board', compact('item'));
    }
}
