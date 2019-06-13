<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return redirect::to('/blog');
    }
    public function blog_post(){

        return redirect::to('/blog_admin/add_post');
    }
  
    public function article_board(){

        $data= DB::table('cms_users')->first();

        return view('pages.article_board', compact('data')); 
    }
}
