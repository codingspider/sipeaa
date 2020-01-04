@extends('layouts.app2')
@section('title', 'Members Profile')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/rokon.css') }}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
    $id = Auth::id();
    $user_details = DB::table('users')
    ->join('members', 'members.users_id', '=', 'users.id')
    ->join('job_categories', 'job_categories.id', '=', 'members.job_area_id')
            ->select('users.*', 'members.*', 'job_categories.category_name as job_cat_name')
            ->where('users.id', $id)
            ->first();

    $job_applies = DB::table('job_applies')
    ->join('jobs', 'jobs.id', '=', 'job_applies.job_id')
            ->select('job_applies.*', 'jobs.*')
            ->where('job_applies.user_id', $id)
            ->get();

            $cv_details = DB::table('online-cv')->where('user_id', $id)->orderBy('id', 'desc')->first();
    $users = DB::table('users')->where('user_type', 'member')->where('id',  '!=', $id)->get();
    $cms_users = DB::table('cms_users')->where('id_cms_privileges', 1)->get();
    
    $unread_messages = DB::table('messages')
          ->join('users', 'users.id', '=', 'messages.sent_to_id')
          ->select('messages.*','users.name as uname' )
          ->where('sent_to_id', Auth::id())
          ->where('notify_status', 0)
          ->get();
          $data = DB::table('jobs')
                            ->where('user_id', Auth::id())
                            ->get();
    $job_posted = DB::table('jobs')->where('user_id', $id)->get();

    $user_type = DB::table('users')->where('approve', 1)->where('id', $id)->first();

    $employe_profile = DB::table('users')
    ->join('employee', 'employee.user_id', '=', 'users.id')
    ->select('users.*', 'employee.*')
    ->where('approve', 1)->where('users.id', $id)->first();

    $member_profile = DB::table('users')
    ->join('members', 'members.users_id', '=', 'users.id')
    ->select('users.*', 'members.*')
    ->where('approve', 1)->where('users.id', $id)->first();

    $job_posted = DB::table('jobs')->where('user_id', $id)->get();


    foreach ($users as  $value) {
   
    }

   
@endphp
<br>
<br>
@if( $user_type->user_type == 'employee')

@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger text-center">
        {{ session()->get('danger') }}
    </div>
@endif

@foreach ($users as $valupic)
    
@endforeach

<div class="container emp-profile">
      <div class="row">
      
          <div class="col-md-4">
              <div class="profile-img">
              <img src="{{ URL::asset('/files/'.$employe_profile->images ) }}" style="width: 235px; height: 200;" alt=""/>
              <div class="file btn btn-lg btn-primary">
                  Change Photo
              <form action="{{ URL::to('/update/profile/picture/employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_images" value="{{$valupic->images}}">

                    <input type="file" name="images" onchange="form.submit()" />
                </form>
              </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="profile-head">
                          <h5>
                              {{ $employe_profile->name }}
                          </h5>
                          <h6>
                            {{ $employe_profile->company_name }}
                          </h6>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" style="color:#000" aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"  style="color:#000" aria-selected="false">Job Posted</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message"  style="color:#000" aria-selected="false">Message</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="job-tab" data-toggle="tab" href="#job" role="tab" aria-controls="job"  style="color:#000" aria-selected="false">Total Application</a>
                      </li>
                      
                  </ul>
              </div>
          </div>
    <div class="col-md-2">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Edit Profile 
  </button>
          </div>
      </div>
      <div class="row">
          <div class="col-md-8">
              <div class="tab-content profile-tab" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Name</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->name }}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Email</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->email }}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Contact Person</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->contact_person }}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Contact Person Designation</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->contact_person_designation }}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Contact Person Phone</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->contact_person_mobile }}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Contact Person Email</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{ $employe_profile->contact_person_email }}</p>
                                  </div>
                              </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Job Title</th>
                              <th scope="col">Company </th>
                              <th scope="col">Possition </th>
                              <th scope="col">Salary</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($job_posted as $item)
                                
                            <tr>
                            <th scope="row">{{ $item->title}}</th>
                            <th scope="row">{{ $item->company_name}}</th>
                            <th scope="row">{{ $item->job_position}}</th>
                            <th scope="row">{{ $item->salary}}</th>
                             
                             
                            </tr>
                            @endforeach
                          
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                  @php
                      $data = DB::table('jobs')
                            ->where('user_id', Auth::id())
                            ->get();

                            

                  @endphp 
                  <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="message-tab">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Job ID</th>
                          <th scope="col">Job Title</th>
                          <th scope="col">Compnay Name</th>
                          <th scope="col">Application Dead line</th>
                          <th scope="col">Total Applicant </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)

                        <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <th scope="row">{{ $item->title }}</th>
                        <th scope="row">{{ $item->company_name }}</th>
                        <th scope="row">{{ $item->application_deadline }}</th>
                        <?php  

                         $total= DB::table('job_applies')
                          ->where('job_id', $item->id)
                          ->count();
                          ?>

                        <th scope="row"><a style="color:blue;" class="btn btn-default btn-block" href="{{url('/applied/job/list/view',$item->id)}}">{{$total}}</a>
                        </th>
                        </tr>
                        @endforeach
                      
                      </tbody>
                    </table>   
                  </div>
              </div>
          </div>
      </div>
</div>
@else 


<div class="container">

  <div class="row">
      <div class="col-md-4">
          <div class="profile-img">
              <img src="{{ URL::asset('/images/'.$member_profile->images ) }}" style="width: 235px; height: 200;" alt=""/>
              <div class="file btn btn-lg btn-primary">
                  Change Photo
              <form action="{{ URL::to('/update/profile/picture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_images" value="{{$value->images}}">
                <input type="hidden" name="user_id" value="{{$id}}">

                    <input type="file" name="images" onchange="form.submit()" />
                </form>
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="profile-head">
                      <h5>
                          {{ $member_profile->name }}
                      </h5>
                      <h6>
                          Web Developer and Designer
                      </h6>
                      <p class="proile-rating">RANKINGS : <span>8/10</span></p>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" style="color:blue;" aria-controls="home" aria-selected="true">Uploaded CV</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Applied Job </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#posted" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Posted Job </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#application" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Application  </a>
                  </li>
                  
              </ul>
          </div>
      </div>
      @php
          $cv_online = DB::table('online-cv')->where('user_id', $id)->first();
          if( $cv_online != NULL){
            foreach ($cv_online as  $item) {
              # code...
            }
          }
      @endphp
      <div class="col-md-2">
    <a  href="{{ URL::to('edit/resume/online') }}" class="btn btn-info">
          Edit CV Online
        </a>
      </div>

  </div>
  <div class="row">
      <div class="col-md-4">
          <div class="profile-work">
          <p style="color: #000">Full-name: {{ $member_profile->first_name}} {{ $member_profile->last_name}}</p>
              <p style="color: #000">Email : {{ $member_profile->email}}</p>
              <p style="color: #000">Mobile Number: {{ $member_profile->phone}}</p>
              <p style="color: #000">Blood Group: {{ $member_profile->blood_group}}</p>
              <p style="color: #000">Batch Number: {{ $member_profile->batch_no}}</p>
              <p style="color: #000">Admission Year: {{ $member_profile->addmission_year}}</p>
              <p style="color: #000">Passing Year: {{ $member_profile->passing_year}}</p>
              <p style="color: #000">Registration No: {{ $member_profile->reg_no}}</p>
              <p style="color: #000">Job Experience: {{ $member_profile->experience_year}}</p>
              <p style="color: #000">Job Skills: {{ $member_profile->job_skill}} </p>
              
              
          </div>
      </div>
      @php
      $id =Auth::id();
      $collection = DB::table('cv')->where('user_id', $id)->get();
  @endphp
      
      <div class="col-md-8">
          <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              
               @if(Session::has('message'))
                      <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
              @endif
               @if(Session::has('wrong_msg'))
                      <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('wrong_msg') !!}</em></div>
              @endif
                  <form action="{{ URL::to('/upload/cv/online') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                          <input type="file" name="upload_file" >
                          <label style="color: red" for="upload_file">File max size: 3mb
                                  File types: pdf
                                  Files allowed: 5</label>
                          <input type="hidden" name="user_id" value="{{$id}}"> 
                          <br>
                          <br>
                          <button class="btn btn-primary" type="submit">Upload CV</button>

              </form>

              <div>
                  <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">View Resume </th>
                              <th scope="col">Download Resume </th>
                              <th scope="col">Action </th>
                             
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($collection as $item)
                                  
                            <tr>
                              <th scope="row"><a href="{{ asset('files/'.$item->upload_file)}}">Open the pdf!</a></th>
                              <td style="color:#0062cc"><a href="{{ asset('files/'.$item->upload_file)}}" download="{{$item->upload_file}}">Download </a> </td>
                              
                            <td>
                            <button type="submit" onclick="window.location.href = '{{ URL::to('/delete/cv', $item->id)}}'" class="btn btn-danger" >Delete</button>
                            </td>
                             
                            </tr>
                            @endforeach
                           
                          </tbody>
                        </table>

          </div>
              </div>
             
              <br>
              <br>
             
              
              <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="profile-tab">
                          
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Company Name</th>
                                  <th scope="col">Applied Post</th>
                                  <th scope="col">Expect Salary</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($job_applies as $item)
                                      
                                <tr>
                                <td>{{ $item->company_name}}</td>
                                  <td>{{ $item->job_position}}</td>
                                  <td>{{ $item->salary}}</td>
                                </tr>
                                @endforeach
                           
                           
                              </tbody>
                            </table>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="posted" role="tabpanel" aria-labelledby="profile-tab">
                          
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table">
                              <thead class="thead-dark col-md-8">
                                <tr>
                                  <th scope="col">Job Title</th>
                                  <th scope="col">Company </th>
                                  <th scope="col">Possition </th>
                                  <th scope="col">Salary</th>
                                  <th scope="col">Edit</th>
                                  <th scope="col">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($job_posted as $item)
                                    
                                <tr>
                                <th scope="row">{{ $item->title}}</th>
                                <th scope="row">{{ $item->company_name}}</th>
                                <th scope="row">{{ $item->job_position}}</th>
                                <th scope="row">{{ $item->salary}}</th>
                                <th scope="row"><input type="button" value="Edit" onclick="window.location = '{{ URL::to('/posted/job/edit/'.$item->id )}}'" class="btn btn-info"></th>
                                <th scope="row"><input type="button" value="Delete" onclick="window.location = '{{ URL::to('/posted/job/delete/'.$item->id )}}'" class="btn btn-danger"></th>
                                 
                                 
                                </tr>
                                @endforeach
                              
                                </tr>
                              </tbody>
                            </table>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="profile-tab">
                          
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Job ID</th>
                                  <th scope="col">Job Title</th>
                                  <th scope="col">Compnay Name</th>
                                  <th scope="col">Application Dead line</th>
                                  <th scope="col">Total Applicant </th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($data as $item)
        
                                <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <th scope="row">{{ $item->title }}</th>
                                <th scope="row">{{ $item->company_name }}</th>
                                <th scope="row">{{ $item->application_deadline }}</th>
                                <?php  
        
                                 $total= DB::table('job_applies')
                                  ->where('job_id', $item->id)
                                  ->count();
                                  ?>
        
                                <th scope="row"><a style="color:blue;" class="btn btn-default btn-block" href="{{url('/applied/job/list/view',$item->id)}}">{{$total}}</a>
                                </th>
                                </tr>
                                @endforeach
                              
                              </tbody>
                            </table>   
                      </div>
                  </div>
              </div>
           

          </div>
         
      </div>

     
  </div>
  
</div>



</div>
@endif

@endsection