<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function approval()
        {
            return view('pages.approval');
        }
    public function members_profile()
        {
            
            return view('pages.members_profile');
        }
    public function employee_profile()
        {
            
            return view('pages.employee_profile');
        }
}
