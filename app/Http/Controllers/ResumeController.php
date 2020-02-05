<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Auth; 
use App\Resume;
use Image;
class ResumeController extends Controller
{
    public function personal_details(Request $request){

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['gender'] = $request->gender;
        $data['dob'] = $request->dob;
        $data['nationality'] = $request->nationality;
        $data['nid'] = $request->nid;
        $data['maritial'] = $request->maritial;
        $data['religion'] = $request->religion;
        $data['pa_number'] = $request->pa_number;
        $data['pid'] = $request->pid;
        $data['mobile1'] = $request->mobile1;
        $data['mobile2'] = $request->mobile2;
        $data['email'] = $request->email;
        $data['email2'] = $request->email2;
        $data['email2'] = $request->email2;
        $data['user_id'] = Auth::id() ;

    	DB::table('resumes')->insert($data); 

    	return back()->with('succes', 'Personal details has been saved. ');

    }


    public function personal_details_edit (Request $request){



        $id = $request->id; 


        DB::table('resumes')->where('id', $id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'nationality'=>$request->nationality,
            'nid'=>$request->nid,
            'maritial'=>$request->maritial,
            'religion'=>$request->religion,
            'pa_number'=>$request->pa_number,
            'pid'=>$request->pid,
            'mobile1'=>$request->mobile1,
            'mobile2'=>$request->mobile2,
            'email'=>$request->email,
            'email2'=>$request->email2,

        ]); 
         return back()->with('success', 'Personal  Details has been updated. ');


    }

    public function address_details_edit (Request $request){
        $id = $request->id; 

        DB::table('resumes')->where('id', $id)->update([
            'present_add'=>$request->present_add,
            'permanent_add'=>$request->permanent_add,

        ]); 
       return back()->with('success', 'Address  Details has been updated. ');
    }

    public function career_details_edit (Request $request){
        $id = $request->id; 

        DB::table('resumes')->where('id', $id)->update([
            'present_sallary' =>$request->present_sallary,
            'looking_for' =>$request->looking_for,
            'job_nature' =>$request->job_nature,
            'exp_sallary' =>$request->exp_sallary,
            
        ]);
       return back()->with('success', 'Address  Details has been updated. ');

    }

    public function prefer_details_edit (Request $request){

        $id = $request->id;

        DB::table('resumes')->where('id', $id)->update([
            'job_categories' => $request->job_categories,
            'job_location' =>$request->job_location,
            
        ]);
       return back()->with('success', 'Prefer job Details has been updated. ');

    }


    public function address_details(Request $request){

    	DB::table('resumes')->insert([
    		'present_add' =>$request->present_add,
    		'permanent_add' =>$request->permanent_add,
            'user_id' =>Auth::id() 
    		
    	]); 

    	return back()->with('success', 'Address Details has been added. ');

    }

    public function carrer_details(Request $request){
    	$id = Auth::id() ;

    	DB::table('resumes')->insert([
    		'present_sallary' =>$request->present_sallary,
    		'looking_for' =>$request->looking_for,
    		'job_nature' =>$request->job_nature,
    		'exp_sallary' =>$request->exp_sallary,
            'user_id' =>Auth::id()
    		
    	]);

    	return back()->with('success', 'Career Details has been added. ');
    }

    public function preffer_job_location (Request $request){

    	DB::table('resumes')->insert([
    		'job_categories' =>$request->job_categories,
    		'job_location' =>$request->job_location,
            'user_id' => Auth::id() 
    	]);
    	return back()->with('success', 'Prefer Job Details has been added. ');

    }

    public function relevant_information (Request $request){

    	DB::table('resumes')->insert([
    		'summery' =>$request->career_summery,
    		'qualification' =>$request->special_qualification,
            'keywords' =>$request->keyword,
            'user_id' => Auth::id() 
    		
    	]);
    	return back()->with('success', 'Other relavant Details has been added. ');

    }

    public function others_relavant_update (Request $request){

        DB::table('resumes')->where('id', $request->id)->update([
            'summery' =>$request->career_summery,
            'qualification' =>$request->special_qualification,
            'keywords' =>$request->keyword,
            'user_id' => Auth::id() 
            
        ]);
        return back()->with('success', 'Other relavant Details has been added. ');

    }



    public function academic_details (Request $request){
        
        $achievements =$request->achievement;
        $results =$request->result;
        $education_levels =$request->education_level;
        $exam_degrees =$request->exam_degree;
        $major_groups =$request->major_group;
        $durations =$request->duration;
        $education_boards =$request->education_board;
        $institutes =$request->institute;
        $years =$request->year;

    	DB::table('resumes')->insert([


    		'achievement' => $achievements,
            'education_level' => $education_levels,
            'result' => $results,
            'exam_degree' => $exam_degrees,
            'major_group' => $major_groups,
            'duration' => $durations,
            'education_board' => $education_boards,
            'institute' => $institutes,
            'passing_year' => $years,
            'user_id' => Auth::id(),
    	]);

    	return back()->with('success', 'Academic Details has been added. ');
    } 

    public function academic_details_edit (Request $request){
        
        $achievements =$request->achievement;
        $results =$request->result;
        $education_levels =$request->education_level;
        $exam_degrees =$request->exam_degree;
        $major_groups =$request->major_group;
        $durations =$request->duration;
        $education_boards =$request->education_board;
        $institutes =$request->institute;
        $years =$request->year;

        DB::table('resumes')->where('id', $request->id )->update([


            'achievement' => $achievements,
            'education_level' => $education_levels,
            'result' => $results,
            'exam_degree' => $exam_degrees,
            'major_group' => $major_groups,
            'duration' => $durations,
            'education_board' => $education_boards,
            'institute' => $institutes,
            'passing_year' => $years,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Academic Details has been added. ');
    } 


    public function training_summary (Request $request){
         $training_titles =$request->training_title;
         $training_countrys =$request->training_country;
         $training_topicss =$request->training_topics;
         $training_insts =$request->training_inst;
         $training_periods =$request->training_period;
         $training_locates =$request->training_locate; 
         $training_years =$request->training_year; 

         
        DB::table('resumes2')->insert([
            'training_title' =>$training_titles,
            'training_country' =>$training_countrys,
            'training_topics' =>$training_topicss,
            'training_inst' =>$training_insts,
            'training_period' =>$training_periods,
            'training_locate' =>$training_locates,
            'training_year' =>$training_years,
            'user_id' =>Auth::id()
 
        ]);

       return back()->with('success', 'Training Details has been added. ');

    }

    public function training_details_edit (Request $request){
         $training_titles =$request->training_title;
         $training_countrys =$request->training_country;
         $training_topicss =$request->training_topics;
         $training_insts =$request->training_inst;
         $training_periods =$request->training_period;
         $training_locates =$request->training_locate; 
         $training_years =$request->training_year; 
         $id =$request->id; 

         
        DB::table('resumes2')->where('id', $id)->update([
            'training_title' =>$training_titles,
            'training_country' =>$training_countrys,
            'training_topics' =>$training_topicss,
            'training_inst' =>$training_insts,
            'training_period' =>$training_periods,
            'training_locate' =>$training_locates,
            'training_year' =>$training_years,
 
        ]);

       return back()->with('success', 'Training Details has been Updated. ');

    }


    public function certificatte1_details2 (Request $request){

        $certicate1s =$request->certificate;
        $certificate_location =$request->certificate_location2;
        $certificate_location_inst =$request->certificate_location_inst;
        $certificate_period =$request->certificate_period;


        DB::table('resumes2')->insert([
            
            'certificate' =>$certicate1s,
            'certificate_location' =>$certificate_location,
            'certificate_location_inst' =>$certificate_location_inst,
            'certificate_period' =>$certificate_period,
            'user_id'=> Auth::id()
        ]);

      return back()->with('success', 'certificate Details has been added. ');

    }


    public function employment_details (Request $request){

         $com_names =$request->com_name;
         $responsibilitiess =$request->responsibilities;
         $com_businesss =$request->com_business;
         $com_loactions =$request->com_loaction;
         $designations =$request->designation;
         $emp_periods =$request->emp_period;

    	DB::table('resumes2')->insert([
    		'com_name' =>$com_names,
    		'responsibilities' =>$responsibilitiess,
    		'com_business' =>$com_businesss,
    		'com_loaction' =>$com_loactions,
    		'designation' =>$designations,
    		'emp_period' =>$emp_periods,
            'user_id' => Auth::id()
    		
    	]);
    	return back()->with('success', 'Employment Details has been added. ');


    }

    public function employement_details_edit (Request $request){

         $com_names =$request->com_name;
         $responsibilitiess =$request->responsibilities;
         $com_businesss =$request->com_business;
         $com_loactions =$request->com_loaction;
         $designations =$request->designation;
         $emp_periods =$request->emp_period;
         $id =$request->id;

        DB::table('resumes2')->where('id', $id)->update([
            'com_name' =>$com_names,
            'responsibilities' =>$responsibilitiess,
            'com_business' =>$com_businesss,
            'com_loaction' =>$com_loactions,
            'designation' =>$designations,
            'emp_period' =>$emp_periods,
            
        ]);
        return back()->with('success', 'Employment Details has been updated. ');

    }

    public function other_employ_history(Request $request){

            DB::table('resumes2')->insert([
                    'batch' =>$request->batch,
                    'batch_no' =>$request->batch_no,
                    'ranks' =>$request->ranks,
                    'type' =>$request->type,
                    'arms' =>$request->arms,
                    'trade' =>$request->trade,
                    'course' =>$request->course,
                    'commission' =>$request->commission,
                    'retirement' =>$request->retirement, 
                    'user_id' =>Auth::id()
                ]); 

            return back()->with('success', 'Employment Details has been updated.');
    }

    public function others_employement_details_edit (Request $request){

            DB::table('resumes2')->where('id', $request->id)->update ([
                    'batch' =>$request->batch,
                    'batch_no' =>$request->batch_no,
                    'ranks' =>$request->ranks,
                    'type' =>$request->type,
                    'arms' =>$request->arms,
                    'trade' =>$request->trade,
                    'course' =>$request->course,
                    'commission' =>$request->commission,
                    'retirement' =>$request->retirement, 
                ]); 

            return back()->with('success', 'Employment Details has been updated.');
    }

    public function others_details (Request $request){


        $vehicleString = implode(",", $request->get('how_did_you_learn'));

        $status = DB::table('resumes2')->insert([
        'skill' => $request->get('skill'),
        'how_did_you_learn' => $vehicleString,
        'user_id' => Auth::id()
        ]);
        return back()->with('success', 'Other Details has been added.');
    }

    public function others_details_edit (Request $request){


        $vehicleString = implode(",", $request->get('how_did_you_learn'));

        $status = DB::table('resumes2')->insert([
        'skill' => $request->get('skill'),
        'how_did_you_learn' => $vehicleString
        ]);
        return back()->with('success', 'Other Details has been updated.');
    }

            


    public function others_language (Request $request){

        $languages =$request->language;
        $readings =$request->reading;
        $writings =$request->writing;
        $speakings =$request->speaking;

        DB::table('resumes2')->insert([
            'language' =>$languages,
            'reading' =>$readings,
            'writing' =>$writings,
            'speaking' =>$speakings,
            'user_id' => Auth::id()
            
        ]);
        return back()->with('success', 'Language Details has been updated.');

    }

    public function others_reference (Request $request){

        $ref_designation = $request->ref_designation; 
        $ref_organization = $request->ref_organization; 
        $ref_mobile = $request->ref_mobile; 
        $ref_email = $request->ref_email; 
        $re_address = $request->re_address; 
        $ref_relation = $request->ref_relation; 
        $ref_name = $request->ref_name; 


        DB::table('resumes')->insert([
            'ref_designation' =>$ref_designation,
            'ref_organization' =>$ref_organization,
            'ref_mobile' =>$ref_mobile,
            'ref_email' =>$ref_email,
            're_address' =>$re_address,
            'ref_relation' =>$ref_relation,
            'ref_name' =>$ref_name,
            'user_id' =>  Auth::id() 
            
        ]);

        return back()->with('success', 'Reference Details has been added.');

    }

    public function reference_details_edit (Request $request){

        $ref_designation = $request->ref_designation; 
        $ref_organization = $request->ref_organization; 
        $ref_mobile = $request->ref_mobile; 
        $ref_email = $request->ref_email; 
        $re_address = $request->re_address; 
        $ref_relation = $request->ref_relation; 
        $ref_name = $request->ref_name; 


        DB::table('resumes')->where('id', $request->id )->update([
            'ref_designation' =>$ref_designation,
            'ref_organization' =>$ref_organization,
            'ref_mobile' =>$ref_mobile,
            'ref_email' =>$ref_email,
            're_address' =>$re_address,
            'ref_relation' =>$ref_relation,
            'ref_name' =>$ref_name,
            
        ]);

        return back()->with('success', 'Reference Details has been updated.');

    }

    public function photograph_upload (Request $request){

        $this->validate($request, [
              'file'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
             ]);

             $image = $request->file('file');

             $image_name = time() . '.' . $image->getClientOriginalExtension();

             $destinationPath = public_path('/uploads');

             $resize_image = Image::make($image->getRealPath());

             $resize_image->resize(150, 150, function($constraint){
              $constraint->aspectRatio();
             })->save($destinationPath . '/' . $image_name);

             $destinationPath = public_path('/images');

             $image->move($destinationPath, $image_name);

    	DB::table('resumes')->insert([
    		'photograph' =>$image_name,
            'user_id' => Auth::id()
    		
    	]);

    	 return back()->with('success', 'Your profile photo has been successfully uploaded.');

    }

    public function view_resume(){

    $id =Auth::id(); 

        $personaldetails = DB::table('resumes')->whereNotNull('first_name')->first();
        $address = DB::table('resumes')->whereNotNull('present_add')->get();
        $career = DB::table('resumes')->whereNotNull('present_sallary')->get();
        $prefer_jobs = DB::table('resumes')->whereNotNull('job_location')->get();
        $career_summery = DB::table('resumes')->whereNotNull('summery')->get();
        $education_level = DB::table('resumes')->whereNotNull('education_level')->get();
        $training_title = DB::table('resumes2')->whereNotNull('training_title')->get();
        $certificate = DB::table('resumes2')->whereNotNull('certificate')->get();
        $employments = DB::table('resumes2')->whereNotNull('com_name')->get();
        $others_employments = DB::table('resumes2')->whereNotNull('batch')->get();
        $specials = DB::table('resumes2')->whereNotNull('skill')->get();
        $languages = DB::table('resumes2')->whereNotNull('language')->get();
        $reference = DB::table('resumes')->whereNotNull('ref_name')->get();
        $gender = DB::table('genders')->get();
            
    	return  view('view_resume', compact('data', 'personaldetails', 'address', 'career', 'prefer_jobs','career_summery','education_level','training_title','certificate', 'employments', 'others_employments', 'specials', 'languages', 'reference', 'gender')); 
    }

}
