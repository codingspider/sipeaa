<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Mail\SendMailableAppliedJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class JobController extends Controller
{
   
    
    public function index()
    {
        return view('pages.job_post');
    }
    public function add_new_job(Request $request)
    {
        if($request->hasFile('images')) {

            $image       = $request->file('images');
            $filename    = $image->getClientOriginalName();
        
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(200, 200);
            $image_resize->save(public_path('images/' .$filename));

        
        }

        $data = array();
        $data['user_id'] = $request->user_id;
        $data['company_name'] = $request->company_name;
        $data['title'] = $request->job_title;
        $data['job_position'] = $request->job_position;
        $data['no_vacancy'] = $request->no_vacancy;
        $data['company_image'] = $filename;
        $data['job_category_id'] = $request->job_category;
        $data['job_location_id'] = $request->job_location;
        $data['job_details'] = $request->job_details;
        $data['job_type'] = $request->optradio;
        $data['job_experience'] = $request->job_experience;
        $data['salary'] = $request->salary;
        $data['application_deadline'] = $request->app_deadline;
        $data['application_instruction'] = $request->apply_instruction;

        DB::table('jobs')->insert($data);
        Session::put('message','Job posted sucessfully');
        return redirect::to('/post/jobs');

    }
    public function update_job_post (Request $request)
    {
        if($request->hasFile('images')) {

            $image       = $request->file('images');
            $filename    = $image->getClientOriginalName();
        
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(200, 200);
            $image_resize->save(public_path('images/' .$filename));

        
        }

        DB::table('jobs')->where('id', $request->id)->update([
            'company_name' => $request->company_name,
            'title' => $request->job_title,
            'job_position' => $request->job_position,
            'job_category_id' => $request->job_category,
            'job_location_id' => $request->job_location,
            'job_details' => $request->job_details,
            'job_type' => $request->optradio,
            'job_experience' => $request->job_experience,
            'salary' => $request->salary,
            'application_deadline' => $request->app_deadline,
            'application_instruction' => $request->apply_instruction,
            'no_vacancy' => $request->no_vacancy,

        ]);

        Session::put('message','Job Updated sucessfully');
        return back ()->with('message','Job Updated sucessfully');

    }

    public function job_apply(Request $request){


       $data['job_id']=$request->job_id;
       $data['user_id']=Auth::id();
       $data['status']=1;
       $data['exp_salary']=$request->expected_salary;
       $data['cv']=$request->cv;
       
        $success = DB::table('job_applies')->insert($data);

        Mail::send( new SendMailableAppliedJob ($request));
        
        if($success){
            return redirect()->back()->with('message', 'Job Applied successfully');
        }else{
             return redirect()->back()->with('message', 'Job Applied Failed');
        }
    }

    public function all_job(){

        $data = DB::table('jobs')->orderBy('id', 'DESC')->get();

        return view ('pages.all_jobs', compact('data'));
    }

    public function job_details($id){

        $data= DB::table('jobs')->where('jobs.id', $id)
        ->join('job_categories', 'job_categories.id', '=', 'jobs.job_category_id')
        ->select('jobs.*', 'job_categories.category_name')->first();


        return view ('pages.job_details',compact('data'));
    }

    public function search_employees(Request $request){
        $id = $request->cate_id;

        $data['values'] = DB::table('employee')
        
                            ->join('job_categories', 'job_categories.id', '=', 'employee.job_area_id')
                            
                            ->select('employee.*', 'job_categories.category_name as cname' )
                            ->where('employee.job_area_id', $id)

                            ->get();

        return view ('pages.search_employees_result', $data);
    }

    public function search_by_location ($id){ 

        $data = DB::table('jobs')->where('job_location_id', $id)->get();

        return view ('pages.search_all_jobs', compact('data'));
    }

    public function search_by_name (Request $request){ 

        function index()
        { 
            return view('live_search'); 
            } 
 
             function action(Request $request){ 
             if($request->ajax()) 
             { 
                $output = ''; 
                $query = $request->get('query'); 
                if($query != '') 
                    { 
                        $data = DB::table('jobs')->where('company_name', 'like', '%'.$query.'%')
                                                            ->orWhere('job_position', 'like', '%'.$query.'%')
                                                            ->orWhere('title', 'like', '%'.$query.'%')
                                                            ->orWhere('job_type', 'like', '%'.$query.'%')
                                                            ->orderBy('id', 'desc') ->get(); 
                                                            } 
                                                            else{ 
                     $data = DB::table('jobs')->orderBy('id', 'desc')->get(); 
                    } 
                          $total_row = $data->count(); 
                          if($total_row > 0) 
                            { 
                                foreach($data as $row) 
                                    { 
                                        $output .= ''.$row->title.''.$row->job_position.''.$row->company_name.''.$row->job_type.''; 
                                        } 
                                    } 
                            else 
                                { 
                                    $output = 'No Data Found';
                                     } 
                            $data = array( 'table_data' => $output, 'total_data' => $total_row ); 
                            echo json_encode($data); 
            } 
        } 
    } 

        public function actBook($job_id){

           $data= DB::table('job_applies')
                            ->join('users','users.id','job_applies.user_id')
                            ->join('jobs','jobs.id','job_applies.job_id')
                            ->select('users.*', 'job_applies.*', 'jobs.*')
                            ->where('job_applies.job_id',$job_id)->get();

            return view('pages.all_candited_list', compact('data'));
           
        }


        public function job_edit ($id){ 

           $data= DB::table('jobs')->where('jobs.id',$id)->first();

            return view('pages.job_edit_page', compact('data'));
           
        }
        public function delete_job_post ($id){ 

           $data= DB::table('jobs')->where('jobs.id',$id)->delete();

            return back()->with('message', 'Job Deleted Succesfully');
           
        }
        
    
}
