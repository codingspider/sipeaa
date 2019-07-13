@extends('layouts.app2')
@section('title', 'Members Profile')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/rokon.css') }}">

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
    $users = DB::table('users')->where('approve', 1)->get();
    $cms_users = DB::table('cms_users')->where('id_cms_privileges', 1)->get();
    
    $unread_messages = DB::table('messages')
          ->join('users', 'users.id', '=', 'messages.sent_to_id')
          ->select('messages.*','users.name as uname' )
          ->where('sent_to_id', Auth::id())
          ->where('notify_status', 0)
          ->get();
    $id = Auth::id();
    
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

{{-- @foreach ($employe_profile as $item)
    
@endforeach --}}

<div class="container emp-profile">
      <div class="row">
      
          <div class="col-md-4">
              <div class="profile-img">
              <img src="{{ URL::asset('/files/'.$employe_profile->images ) }}" style="width: 235px; height: 200;" alt=""/>
               
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ URL::to('/employee/profile/update') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                <div class="col-md-6">
                    <input  type="text" style="border:1px solid #818182" class="form-control" name="name" value="{{ $employe_profile->name }}"  autofocus>

                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User email') }}</label>

                <div class="col-md-6">
                    <input  type="email" style="border:1px solid #818182" class="form-control" name="email" value="{{ $employe_profile->email }}"  autofocus>

                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Password') }}</label>

                <div class="col-md-6">
                    <input  type="password" style="border:1px solid #818182" class="form-control" name="email"  autofocus>

                </div>
            </div>
            
            <br>
            <br>
            <h4 style="color:green">Company details</h4>
              <br>
              <input type="hidden" name="user_id" value="{{Auth::id()}}">
              <br>
              <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Compnay Name') }}</label>

              <div class="col-md-6">
              <input id="text" type="text" style="border:1px solid #818182" class="form-control" name="co_name" value="{{ $employe_profile->company_name }}" >
              </div>
              </div>
              <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

              <div class="col-md-6">
              <input id="text" style="border:1px solid #818182" type="text" class="form-control" name="contact_person" value="{{ $employe_profile->contact_person }}" >

              </div>
              </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" style="border:1px solid #818182" type="email" class="form-control" name="email" value="{{ $employe_profile->email }}" >
                </div>
            </div>
            

            <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Persons phone') }}</label>

                    <div class="col-md-6">
                        <input style="border:1px solid #818182" id="text" type="text" class="form-control" name="phone" value="{{ $employe_profile->contact_person_mobile }}">

                    </div>
                </div>
            <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Persons Designation') }}</label>

                    <div class="col-md-6">
                        <input style="border:1px solid #818182" id="text" type="text" class="form-control" name="designation" value="{{ $employe_profile->contact_person_designation }}" required>

                    </div>
                    <br>

                </div>
              <input type="hidden" name="old_images" value="{{ $employe_profile->images }}">
            <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                    <div class="col-md-6">
                        <input type="file"  class="form-control" name="images">

                    </div>
                    <br>

                </div>
                 

            <br>
            <div class="form-group col-lg-6">
            <input type="submit" value="Update" class="btn btn-primary btn-modern float-right">
            </div>
                
            
        </form>
        </div>
     
      </div>
    </div>
  </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
              <div class="profile-work">
                 
              </div>
          </div>
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
                  <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message">
                      <table class="table">
                          <form action="{{ URL::to('/employee/message/sent') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="row">
                                        <div class="col">
                                            <label for="name">
                                                Select Admin</label>
                                           <select style="border:1px solid #818182" name="sent_to_id_admin" id="receiver_id" class="form-control">
                                            <option>Select a User </option>
                                            @foreach ($cms_users as $item)
                                                
                                           <option value="{{ $item->id}}">{{ $item->name}}</option>
                                            @endforeach

                                           </select>

                                        </div>
                                          
                                      </div>
                                      <br>
                                      <div class="form-group">
                                          <label for="email">
                                             Subject </label>
                                          <div class="input-group">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                              </span>
                                              <input style="border:1px solid #818182" name="subject" type="text" class="form-control" id="subject" placeholder="Enter subject" required="required" /></div>
                                              <br>
                                              <label for="attachment">Add A File</label>
                                               <input type="file" name="attachment">
                                            </div>

                                    
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="message">
                                              Message</label>
                                          <textarea style="border:1px solid #818182" name="message" id="message" class="form-control" rows="9" cols="50" required="required"
                                              placeholder="Message"></textarea>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-12">
                                      <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                          Send Message</button>
                                  </div>
                              </div>
                              </form>
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
              <img src="{{ URL::asset('/files/'.$member_profile->images ) }}" style="width: 235px; height: 200;" alt=""/>
              <div class="file btn btn-lg btn-primary">
                  Change Photo
                  <input type="file" name="file"/>
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
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" style="color:blue;" aria-controls="home" aria-selected="true">My CV</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Applied Job List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" style="color:blue;" aria-selected="false">View CV</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-primary"style="margin:5px; min-width: 120px;" data-toggle="modal" data-target="#exampleModal">
          Create Your CV
        </button>
        <button type="button" class="btn btn-dark pull-left" style="margin:5px;" data-toggle="modal" data-target="#viewcv">
          View CV Online
        </button>
    <button type="button" class="btn btn-info pull-left" style="margin:5px;" data-toggle="modal" data-target="#cvedit">
          Edit CV Online
        </button>
      </div>
  {{-- asdf     --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Online CV Creator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body col-md-12">
       
          <p style="color: red">You Must Fill All the Options </p>
          <form action="{{ URL::to('/online/cv/create') }}" method="POST" id="form" enctype="multipart/form-data">
          @csrf

         
          <div class="media">
            <ul class="nav nav-tabs" id="myForm">
              <li class="active col-xs-3 nav-tabs"><a href="#one">Personal</a></li>
              <li class="col-xs-3 nav-tabs"><a href="#two">Education / Training</a></li>
              <li class="col-xs-3 nav-tabs"><a href="#three">Employment</a></li>
              <li class="col-xs-3 nav-tabs"><a href="#five">Photograph</a></li>
          </ul>
          </div>
          
             
                  <div class="tab-content form-group">

                  <div class="tab-pane active" id="one">
                          <div class="row">
                                  <div class="col">
                                      <label for="">First Name</label>
                                    <input type="text" style="border:1px solid #818182" name="first_name" style="color:#3931af" class="form-control" placeholder="First name">
                                  </div>
                                  <div class="col">
                                          <label for="">Last Name</label>
                                    <input type="text" style="border:1px solid #818182" name="last_name" style="color:#3931af" class="form-control" placeholder="Last name">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Nationality</label>
                                    <input type="text" style="border:1px solid #818182" name="nationality" style="color:#3931af" class="form-control" placeholder="Nationality">
                                  </div>
                                  <div class="col">
                                          <label for="">National ID</label>
                                    <input type="text" style="border:1px solid #818182" name="na_id" style="color:#3931af" class="form-control" placeholder="National ID NO">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Father Name</label>
                                    <input type="text" style="border:1px solid #818182" name="father_name" style="color:#3931af" class="form-control" placeholder="Father Name">
                                  </div>
                                  <div class="col">
                                          <label for="">Mother Name</label>
                                    <input type="text" style="border:1px solid #818182" name="mother_name" style="color:#3931af" class="form-control" placeholder="Mother Name">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Date of Birth</label>
                                    <input type="date" style="border:1px solid #818182" name="dob" style="color:#3931af" class="form-control" placeholder="Date Of Birth">
                                  </div>
                                  <div class="col">
                                          <label for="">Phone Number</label>
                                    <input type="text" style="border:1px solid #818182" name="mobile" style="color:#3931af" class="form-control" placeholder="Phone Number">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Gender</label>
                                    <select style="border:1px solid #818182" class="form-control" name="gender" id="gender">
                                          <option value="Married">--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                  </div>
                                  <div class="col">
                                          <label for="">Maritial Status</label>
                                  <select style="border:1px solid #818182" class="form-control" name="maritial_status">
                                          <option value="Married">--Select--</option>
                                          <option value="Married">Married</option>
                                          <option value="Unmarried">Unmarried</option>
                                          <option value="Single">Single</option>
                                      </select>
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Present Address</label>
                                    <input style="border:1px solid #818182" type="text" name="present_add" style="color:#3931af" class="form-control" placeholder="Present Address">
                                  </div>
                                  <div class="col">
                                          <label for="">Permanent Address</label>
                                    <input style="border:1px solid #818182" type="text" name="permanent_add" style="color:#3931af" class="form-control" placeholder="Permanent Address">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                          <label for="">Job Type</label>
                                    <select style="border:1px solid #818182" class="form-control" name="job_type" id="gender">
                                        <option value="Male">Select your Job type</option>
                                        <option value="Male">Full Time</option>
                                        <option value="Female">Part Time</option>
                                        <option value="Others">Entry Level</option>
                                        <option value="Others">High Level</option>
                                    </select>
                                  </div>
                                  <div class="col">
                                          <label for="">Expect Salary</label>
                                          <input style="border:1px solid #818182" type="text" name="exp_salary" style="color:#3931af" class="form-control" placeholder="Expected Salary">
                                  </div>
                                    <br>
                                  <div class="row">
                                      <label for="Email"> Email </label>
                                      <input style="border:1px solid #818182" type="email" name="email" class="form-control" placeholder="email" required>
                                    </div>
                          </div>
                          
                  
                  </div>
                  <div class="tab-pane" id="two">
                          <div class="row">
                                  <div class="col">
                                      <label for="education">Level of Education 
                                          </label>
                                      <select style="border:1px solid #818182" required class="form-control" name="level_education" id="gender">
                                          <option value="PSC">PSC/5 pass</option>
                                          <option value="JSC/JDC">JSC/JDC/8 pass</option>
                                          <option value="Secondary">Secondary</option>
                                          <option value="Secondary">Higher Secondary</option>
                                          <option value="Diploma" selected="">Diploma</option>
                                          <option value="Honors">Bachelor/Honors</option>
                                          <option value="Masters">Masters</option>
                                          <option value="PhD">PhD (Doctor of Philosophy)</option>
                                      </select>
                                    
                                  </div>
                                  <div class="col">
                                      <label for="education">Results 
                                          </label>
                                      <select style="border:1px solid #818182" class="form-control" name="job_type" id="gender">
                                              <option value="0">Select</option>
                                              <option value="Firs_class">First Division/Class</option>
                                              <option value="Second_class">Second  Division/Class</option>
                                              <option value="Third_class">Third Division/Class</option>
                                              <option value="Grade">Grade</option>
                                              <option value="Appeared">Appeared</option>
                                              <option value="Enrolled">Enrolled</option>
                                              <option value="Awarded">Awarded</option>
                                              <option value="Do_not_Mention">Do not mention</option>
                                              <option value="Passed" selected="">Pass</option> 
                                      </select>
                                    
                                  </div>
                                  
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                      <label for="education">Board of Education 
                                          </label>
                                      <select style="border:1px solid #818182" required class="form-control" name="board_education" id="gender">
                                              <option value="Chattogram">Chattogram</option>
                                              <option value="Cumilla">Cumilla</option>
                                              <option value="Dhaka">Dhaka</option>
                                              <option value="Dinajpur">Dinajpur</option>
                                              <option value="Jashore">Jashore</option>
                                              <option value="Rajshahi">Rajshahi</option>
                                              <option value="Sylhet">Sylhet</option>
                                              <option value="Madrasah">Madrasah</option>
                                              <option value="Technical">Technical</option>
                                      </select>
                                    
                                  </div>
                                  <div class="col">
                                      <label for="education">Instititue Name 
                                          </label>
                                     <input style="border:1px solid #818182" type="text" name="institiute" class="form-control" placeholder="Instititue Name" required>
                                      </select>
                                    
                                  </div>
                                  
                          </div>
                  </div>
                  <div class="tab-pane" id="three">
                          <div class="row">
                                  <div class="col">
                                      <label for=""> Company Name</label>
                                    <input style="border:1px solid #818182" type="text" name="company_name" style="color:#3931af" class="form-control" placeholder="Company Name">
                                  </div>
                                  <div class="col">
                                      <label for="">company Buisiness</label>
                                    <input style="border:1px solid #818182" type="text" name="compnay_buisness" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                      <label for=""> Designation</label>
                                    <input style="border:1px solid #818182" type="text" name="designation" style="color:#3931af" class="form-control" placeholder="Company Name">
                                  </div>
                                  <div class="col">
                                      <label for="">company Location</label>
                                    <input style="border:1px solid #818182" type="text" name="compnay_loacation" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                  </div>
                          </div>
                          <br>
                          <div class="row">
                                  <div class="col">
                                      <label for=""> Employment Period From</label>
                                    <input style="border:1px solid #818182" type="date" name="from_date" style="color:#3931af" class="form-control" placeholder="Start Date">
                                  </div>
                                  <div class="col">
                                      <label for="">Employment Period till</label>
                                    <input  type="date" name="to_date" style="color:#3931af" class="form-control" placeholder="End Date">
                                  </div>
                          </div>
                  </div>
                 
                  <div class="tab-pane" id="five">
                      <label for="">Add Photograph</label>
                      <br>
                      <input type="file" name="images" required>
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <br>
                      <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                              <button type="submit" onclick="document.getElementById('form').submit();" class="btn btn-primary">Save changes</button>
                      </div>
                  </div>    
              </div>
                  
           </form>

      </div>
    
    </div>
  </div>
</div>
  {{-- modal --}}
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
              <p style="color: #000">Job Areas: {{ $member_profile->job_cat_name}}</p>
              
              
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
             
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        demo
              </div>
              <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="profile-tab">
                          
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table table-info">
                              <thead>
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

          </div>
          <div class="container">
              <section id="tabs">
                  <div class="container">
                    <h6 class="section-title h1">Messages</h6>
                    <div class="row">
                      <div class="col-xs-12 ">
                        <nav>
                          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Messages</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">All Unread Messages</a>
                           
                          </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <form action="{{ URL::to('/member/message/sent') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="row">

                                            <div class="col">
                                                <label for="name">
                                                    Select User</label>
                                               <select style="border:1px solid #818182" name="sent_to_id" class="form-control">
                                                <option value="0">Select a User </option>
                                                @foreach ($users as $item)
                                                    
                                               <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                @endforeach

                                               </select>

                                            </div>
                                            <div class="col">
                                                <label for="name">
                                                    Select Admin</label>
                                               <select style="border:1px solid #818182" name="sent_to_id_admin" class="form-control">
                                                <option value="0">Select a Admin </option>
                                                @foreach ($cms_users as $item)
                                                    
                                               <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                @endforeach

                                               </select>

                                            </div>
                                                                                   
                                          </div>
                                          <div class="form-group">
                                              <label for="email">
                                                 Subject </label>
                                              <div class="input-group">
                                                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                  </span>
                                                  <input style="border:1px solid #818182" name="subject" type="text" class="form-control" id="subject" placeholder="Enter subject" required="required" /></div>
                                                  <br>
                                                  <label for="attachment">Add A File</label>
                                                   <input type="file" name="attachment">
                                                </div>

                                        
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="message">
                                                  Message</label>
                                              <textarea style="border:1px solid #818182" name="message" id="message" class="form-control" rows="9" cols="50" required="required"
                                                  placeholder="Message"></textarea>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-12">
                                          <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                              Send Message</button>
                                      </div>
                                  </div>
                                  </form>
                          </div>
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            @php
                            
                                    $unread_messages = DB::table('messages')
                                      ->select('messages.*')
                                      ->where('sent_to_id', 20)
                                      
                                     ->orderBy('id', 'desc')
                                      ->get();

                                    
                                 
                            @endphp
                            <div class="container">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Message ID</th>
                                            <th scope="col">Message Subject </th>
                                   
                                            <th scope="col">Message Reply</th>
                                            <th scope="col">Message Seen</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($unread_messages as $item)
                                            
                                          @if($item->notify_status == 0)
                                          <tr>
                                          <th>{{ $item->id }}</th>
                                          <th>{{ $item->subject }}</th>
                                          

                                          <th> <button class="btn btn-primary" OnClick="DoAction({{ $item->id }});" >View Message </button> </th>
                                           
                                          </tr>
                                          @else 
                                          <tr>
                                              <th>{{ $item->id }}</th>
                                               
                                              <th>{{ $item->subject }}</th>
                                             
                                              <th> <button class="btn btn-primary" OnClick="DoAction({{ $item->id }});" >View Message </button> </th>
                                               <th><li class="fa fa-check"></li></th>
                                              </tr>
                                          @endif 
                            
                                          @endforeach
                            
                                        </tbody>
                                      </table>
                                </div>
                            
                            </div>
                            <script>
                            function DoAction(id)
                            {
                                $.ajax({
                                     type: "get",
                                     url: "/read/message/",
                                     data: "id=" + id,
                                     dataType: 'json',
                                     success: function(data){
                                        if(data){
                                          var text = "No Files There !";
                                                 $('#myModal').modal('show');
                                                 $('#subject').text(data.subject);
                                                 $('#body').text(data.body);
                                                 $('#created_at').text(data.created_at);
                                                 if(data.attachment){
                                                 $('#attachment').html('<img src="files/' + data.attachment + '" width="100" />');
                                               
                                                }else{
                                                  $('#attachment').text(text);
                                                }
                                     }
                                    }
                                });
                            }
                            
                            function SendAction(id)
                            {
                              $('#message').modal('show');
                              $('#sender_id').val(id);
                            }
                            </script>
                            <!-- view message modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                              
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-body">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr>
                                                
                                                <th>Message</th>
                                                <th>Attachment</th>
                                                <th>Creted At</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                
                                                <td id="body"></td>
                                                <td id="attachment"></td>
                                                <td id="created_at"></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                              
                                </div>
                              </div>
                            
                            <!-- send message modal -->
                              
                          </div>    
                        
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </section>
                <script type="text/javascript">
                                            $.ajax({
                            type: 'GET', //THIS NEEDS TO BE GET
                            url: '/admin/message/sent/{{$item->id}}',
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                container.html('');
                                $.each(data, function(index, item) {
                                container.html(''); //clears container for new data
                                $.each(data, function(i, item) {
                                      container.append('<div class="row"><div class="ten columns"><div class="editbuttoncont"><button class="btntimestampnameedit" data-seek="' + item.timestamp_time + '">' +  new Date(item.timestamp_time * 1000).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0] +' - '+ item.timestamp_name +'</button></div></div> <div class="one columns"><form action="'+ item.timestamp_id +'/deletetimestamp" method="POST">' + '{!! csrf_field() !!}' +'<input type="hidden" name="_method" value="DELETE"><button class="btntimestampdelete"><i aria-hidden="true" class="fa fa-trash buttonicon"></i></button></form></div></div>');
                              });
                                    container.append('<br>');
                                });
                            },error:function(){ 
                                console.log(data);
                            }
                        });
                  </script>
                <!-- ./Tabs -->
          </div>
         
      </div>

     
  </div>
  
</div>

<div class="modal fade" id="viewcv" tabindex="-1" role="dialog" aria-labelledby="viewcv" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="viewcv">CV VIEW</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
        <div class="container">
                <section class="col-md-12">
                        <div class="panel-body">
                          <article class="panel-body">
                            <figure class="text-center">
                            <img src="{{ URL::asset('files/'.$cv_details->images) }}" class="img-thumbnail img-circle img-responsive" style="width:200px; height:300" alt="me">
                            <br>  
                            <br>  
                            <figcaption>

                              <h3>{{ $cv_details->first_name }} {{ $cv_details->last_name }}</h3> {{ $cv_details->permanent_add}}
                                <br> Tel. {{ $cv_details->mobile }} E-mail: {{ $cv_details->email }}
                              </figcaption>
                            </figure>
                          </article>
                          <br>
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                             
                                  <th scope="col">Personal Details </th>
                                  <th scope="col">Education Details </th>
                                  <th scope="col">Job Experience </th>
                                  <th scope="col">Others </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                               
                                  <td ><dt>Date of Birth: <dd>{{ $cv_details->dob }}</dd></dt>
                                    <dt>Marital Status: <dd>{{ $cv_details->maritial_status }}</dd></dt>
                                    <dt>Gender: <dd>{{ $cv_details->gender }}</dd></dt></td>
                                  <td>
                                      <dt>Last Degree: <dd>{{ $cv_details->level_education}}</dd></dt>
                                      <dt>Board: <dd>{{ $cv_details->board_education}}</dd></dt>
                                    <dt>Institiute: <dd>{{ $cv_details->institiute}}</dd></dt>

                                  <td>
                                      <dt>Job Period: <dd>{{ $cv_details->from_date}} to {{ $cv_details->to_date}}</dd></dt>
                                      <dt>Designation: <dd>{{ $cv_details->designation}}</dd></dt>
                                      <dt>Company Name: <dd>{{ $cv_details->company_name}}</dd></dt>
                                      <dt>Company Business: <dd>{{ $cv_details->compnay_buisness}}</dd></dt>
                                      <dt>Company Location: <dd>{{ $cv_details->compnay_loacation}}</dd></dt>

                                  </td>
                                  <td>
                                      <dt>Father Name: <dd>{{ $cv_details->father_name}}</dd></dt>
                                      <dt>Mother Name: <dd>{{ $cv_details->mother_name}}</dd></dt>
                                      <dt>Nationality: <dd>{{ $cv_details->nationality}}</dd></dt>
                                      <dt>Nationality ID: <dd>{{ $cv_details->na_id}}</dd></dt>
                                      <dt>Expected Salary: <dd>{{ $cv_details->exp_salary}}</dd></dt>

                                  </td>
                                </tr>
                              
                              </tbody>
                            </table>
                          </div>
             
            
                        </div>
                      </section>
              </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
</div>
</div>
</div>
</div>

<div class="modal fade" id="cvedit" tabindex="-1" role="dialog" aria-labelledby="cvedit" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="cvedit">CV Edit</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
    <form action="{{ URL::to('/online/cv/update/') }}" method="POST" id="cvupdate">
    @csrf

            <div class="tab-content form-group">

            <div class="tab-pane active" id="one">
                    <div class="row">
                            <div class="col">
                                <label for="">First Name</label>
                            <input type="text" style="border:1px solid #818182" name="first_name" style="color:#3931af" value="{{ $cv_details->first_name}}" class="form-control" placeholder="First name">
                           <input type="hidden" name="id" value="{{ $cv_details->id}}">
                          </div>
                            <div class="col">
                                    <label for="">Last Name</label>
                              <input type="text" style="border:1px solid #818182" name="last_name" style="color:#3931af" value="{{ $cv_details->last_name}}" class="form-control" placeholder="Last name">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                                <label for="">Nationality</label>
                          <input type="text" style="border:1px solid #818182" name="nationality" style="color:#3931af" value="{{ $cv_details->nationality}}" class="form-control" placeholder="Nationality">
                        </div>
                        <div class="col">
                                <label for="">National ID</label>
                          <input type="text" style="border:1px solid #818182" name="na_id" style="color:#3931af" value="{{ $cv_details->na_id}}" class="form-control" placeholder="National ID NO">
                        </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                            <label for="">Father Name</label>
                      <input type="text" style="border:1px solid #818182" name="father_name" style="color:#3931af" value="{{ $cv_details->father_name}}" class="form-control" placeholder="Father Name">
                    </div>
                    <div class="col">
                            <label for="">Mother Name</label>
                      <input type="text" style="border:1px solid #818182" name="mother_name" style="color:#3931af" value="{{ $cv_details->mother_name}}" class="form-control" placeholder="Mother Name">
                    </div>
            </div>
            <br>
            <div class="row">
                    <div class="col">
                            <label for="">Date of Birth</label>
                      <input type="date" style="border:1px solid #818182" name="dob" style="color:#3931af" class="form-control" placeholder="Date Of Birth">
                    </div>
                    <div class="col">
                            <label for="">Phone Number</label>
                      <input type="text" style="border:1px solid #818182" name="mobile" style="color:#3931af" value="{{ $cv_details->mobile}}" class="form-control" placeholder="Phone Number">
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                        <label for="">Gender</label>
                  <select style="border:1px solid #818182" class="form-control" name="gender" id="gender">
                        <option value="Married">--Select--</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                  </select>
                </div>
                <div class="col">
                        <label for="">Maritial Status</label>
                <select style="border:1px solid #818182" class="form-control" name="maritial_status">
                        <option value="Married">--Select--</option>
                        <option value="Married">Married</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="Single">Single</option>
                    </select> 
                </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                    <label for="">Present Address</label>
              <input style="border:1px solid #818182" type="text" name="present_add" style="color:#3931af" value="{{ $cv_details->present_add}}" class="form-control" placeholder="Present Address">
            </div>
            <div class="col">
                    <label for="">Permanent Address</label>
              <input style="border:1px solid #818182" type="text" name="permanent_add" style="color:#3931af" value="{{ $cv_details->permanent_add}}" class="form-control" placeholder="Permanent Address">
            </div>
    </div>
    <br>
    <div class="row">
            <div class="col">
                    <label for="">Job Type</label>
              <select style="border:1px solid #818182" class="form-control" name="job_type" id="gender">
                  <option value="Male">Select your Job type</option>
                  <option value="Male">Full Time</option>
                  <option value="Female">Part Time</option>
                  <option value="Others">Entry Level</option>
                  <option value="Others">High Level</option>
              </select>
            </div>
            <div class="col">
                    <label for="">Expect Salary</label>
                    <input style="border:1px solid #818182" type="text" name="exp_salary" style="color:#3931af" value="{{ $cv_details->exp_salary}}" class="form-control" placeholder="Expected Salary">
            </div>
    </div>
    <br>
    <div class="tab-pane" id="two">
        <div class="row">
                <div class="col">
                    <label for="education">Level of Education 
                        </label>
                    <select style="border:1px solid #818182" required class="form-control" name="level_education" id="gender">
                        <option value="PSC">PSC/5 pass</option>
                        <option value="JSC/JDC">JSC/JDC/8 pass</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Secondary">Higher Secondary</option>
                        <option value="Diploma" selected="">Diploma</option>
                        <option value="Honors">Bachelor/Honors</option>
                        <option value="Masters">Masters</option>
                        <option value="PhD">PhD (Doctor of Philosophy)</option>
                    </select>
                  
                </div>
                <div class="col">
                    <label for="education">Results 
                        </label>
                    <select  style="border:1px solid #818182" class="form-control" name="job_type" id="gender">
                            <option>Select</option>
                            <option value="Firs_class">First Division/Class</option>
                            <option value="Second_class">Second  Division/Class</option>
                            <option value="Third_class">Third Division/Class</option>
                            <option value="Grade">Grade</option>
                            <option value="Appeared">Appeared</option>
                            <option value="Enrolled">Enrolled</option>
                            <option value="Awarded">Awarded</option>
                            <option value="Do_not_Mention">Do not mention</option>
                            <option value="Passed" selected="">Pass</option> 
                    </select>

                    
                  
                </div>
                <div class="col">
                    <label for="">Expect Salary</label>
                    <input style="border:1px solid #818182" type="email" name="email" style="color:#3931af" value="{{ $cv_details->email}}" class="form-control" placeholder="Put your email">
                 </div>
        </div>
        <br>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                        <button type="submit" onclick="document.getElementById('cvupdate').submit();" class="btn btn-primary">Save changes</button>
                </div>
            </div>    
        </div>
            
     </form>
</div>

</div>
</div>
</div>
</div>
<script>
$('#myForm a').click(function (e) {
e.preventDefault();
$(this).tab('show');
})
</script>
@endif

@endsection