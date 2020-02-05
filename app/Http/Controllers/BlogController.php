<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class BlogController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(){

        return redirect::to('/blog');
    }
    public function blog_post(){

        return redirect::to('/blog_admin/add_post');
    }
  
    public function article_board(){

        $president= DB::table('canditates')->where('type', 'President')->first();
        $Vice_President= DB::table('canditates')->where('type', 'Vice-President')->first();
        $general_Secretary= DB::table('canditates')->where('type', 'General Secretary')->first();
        $Joint_Secretary= DB::table('canditates')->where('type', 'Joint Secretary')->get();
        $Treasurer= DB::table('canditates')->where('type', 'Treasurer')->first();
        $Organizing_sec= DB::table('canditates')->where('type', 'Organizing Secretary')->first();
        $information_sec= DB::table('canditates')->where('type', 'Information and Publication Secretary')->first();
        $cultutal_sec= DB::table('canditates')->where('type', 'Cultural Secretary')->first();
        $cabinate_sec= DB::table('canditates')->where('type', 'Cabinet Secretary')->first();
        $ex_member= DB::table('canditates')->where('type', 'Executive Member')->first();

        return view('pages.article_board', compact('president', 'Vice_President', 'general_Secretary', 'Joint_Secretary', 'Treasurer', 'Organizing_sec', 'information_sec', 'cultutal_sec', 'cabinate_sec', 'ex_member')); 
    }
}
