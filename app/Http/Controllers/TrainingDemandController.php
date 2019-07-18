<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Mail\MailNotify;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
session_start();


class TrainingDemandController extends Controller
{
    public function index(){


    	return view ('pages.training_demand');
    }
    

    public function training_demand(Request $request)
    {     
        $data = array();
        $data['traing_need'] = $request->training_need;
        $data['demand_date'] = $request->form_date;
        $data['description'] = $request->description;
        $data['demand_by'] = $request->id;
               
        $success = DB::table('training_demands')->insert($data);
        Session::put('message','Training added sucessfully');
        
        Mail::send( new MailNotify ($request));
        
        return redirect::back();
    

    }

    public function training_list(){

        $data = DB::table('trainings')->orderBy('id', 'desc')->get();
        return view ('pages.all_training', compact('data'));
    }

    public function training_status(){
        $data = DB::table('training_demands')
        ->join('users', 'users.id', '=', 'training_demands.demand_by')
                    ->select('training_demands.*', 'users.name as tname')
        ->orderBy('id', 'desc')->get();

        return view('pages.training_demand_status_control', compact('data'));
    }

    public function training_status_update(Request $request){
            
            $id = $request->id;

            $success = DB::table('training_demands')->where('id',$id)->update(
                [
                  'training_status' => $request->status,
                  
                ]);
            if ($success) {
                return redirect::back()->with('success','Status Updated Successfully !');
            }else{
                return redirect::back()->with('danger','Something went wrong! please try again');   
            }
    }

    public function assign_trainer (Request $request){
        
    $id = $request->id;
    $data = $request->assign_trainer;

    $success = DB::table('training_demands')->where('id', $request->id)->update(
            [
                'training_assigned' => $data,
                   ]);

        if ($success) {
            return redirect::back()->with('success','Trainer Assigned !');
        }else{
            return redirect::back()->with('danger','Something went wrong! please try again');   
        }
    }


    public function training_delete_status($id){

        $success = DB::table('training_demands')->where('id',$id)->delete();
        if ($success) {
            return redirect::back()->with('success','Deleted Successfully !');
        }else{
            return redirect::back()->with('danger','Something went wrong! please try again');   
        }
    }

    public function assign_trainer_view (){      

        $success = DB::table('training_demands')
                    ->join('users', 'users.id', '=', 'training_demands.training_assigned')
                    ->select('training_demands.*', 'users.id as uid', 'users.name as tname')
                    ->orderBy('updated_at', 'desc' )
                    ->get();

                
                    return view ('pages.assign_trainer_view', compact('success'));
                    
    }

}
