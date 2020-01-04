<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Resume; 
use Response;
use Alert;

class TestController extends Controller
{
  public function personaldetails_delete(Request $request){

     DB::table('resumes')->where('id', $request->id)->delete();
  
    return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
  }

   public function academicdetails_delete (Request $request){

     DB::table('resumes')->where('id', $request->id)->delete();
  
    return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
  }

  public function addressdetails_delete ( $id){

     DB::table('resumes')->where('id', $id)->delete();
  
    return back()->with('success', 'Record deleted successfully!');
  }

  public function career_details_delete ( $id){

       DB::table('resumes')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

  public function prefer_details_delete ( $id){

       DB::table('resumes')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }
  public function other_details_delete ( $id){

       DB::table('resumes')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

    public function training_details_delete ( $id){

       DB::table('resumes')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

    public function certificate_details_delete ( $id){

       DB::table('resumes2')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

    public function employment_details_delete ( $id){

       DB::table('resumes2')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

    public function special_details_delete ( $id){

       DB::table('resumes2')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }

    public function language_details_delete ( $id){

       DB::table('resumes2')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }
    public function refer_details_delete ( $id){

       DB::table('resumes2')->where('id', $id)->delete();
    
      return back()->with('success', 'Record deleted successfully!');
    }




}