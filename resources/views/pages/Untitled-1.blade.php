@extends('layouts.app2')
@section('title', 'Members Profile')
@section('content')

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

@endphp
<div class="container emp-profile">

        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                <img src="{{ URL::asset('files/'.$cv_details->images) }}" style="width: 200px; hei" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{ $user_details->first_name}} {{ $user_details->last_name}}
                            </h5>
                           
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" style="color:blue;" aria-controls="home" aria-selected="true">My CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Applied Job List</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                
                <button type="button" class="btn btn-primary"style="margin:5px;" data-toggle="modal" data-target="#exampleModal">
                    Create Your CV
                  </button>
                  <button type="button" class="btn btn-dark pull-left" style="margin:5px;" data-toggle="modal" data-target="#viewcv">
                        View CV Online
                      </button>
                  <button type="button" class="btn btn-info pull-left" style="margin:5px;" data-toggle="modal" data-target="#cvedit">
                        Edit CV Online
                      </button>

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

                           
                            <ul class="nav nav-tabs" id="myForm">
                                    <li class="active"><a href="#one">Personal</a></li>
                                    <li><a href="#two">Education / Training</a></li>
                                    <li><a href="#three">Employment</a></li>
                                    <li><a href="#five">Photograph</a></li>
                             </ul>
                            
                               
                                    <div class="tab-content form-group">
         
                                    <div class="tab-pane active" id="one">
                                            <div class="row">
                                                    <div class="col">
                                                        <label for="">First Name</label>
                                                      <input type="text" name="first_name" style="color:#3931af" class="form-control" placeholder="First name">
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Last Name</label>
                                                      <input type="text" name="last_name" style="color:#3931af" class="form-control" placeholder="Last name">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                            <label for="">Nationality</label>
                                                      <input type="text" name="nationality" style="color:#3931af" class="form-control" placeholder="Nationality">
                                                    </div>
                                                    <div class="col">
                                                            <label for="">National ID</label>
                                                      <input type="text" name="na_id" style="color:#3931af" class="form-control" placeholder="National ID NO">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                            <label for="">Father Name</label>
                                                      <input type="text" name="father_name" style="color:#3931af" class="form-control" placeholder="Father Name">
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Mother Name</label>
                                                      <input type="text" name="mother_name" style="color:#3931af" class="form-control" placeholder="Mother Name">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                            <label for="">Date of Birth</label>
                                                      <input type="date" name="dob" style="color:#3931af" class="form-control" placeholder="Date Of Birth">
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Phone Number</label>
                                                      <input type="text" name="mobile" style="color:#3931af" class="form-control" placeholder="Phone Number">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                            <label for="">Gender</label>
                                                      <select class="form-control" name="gender" id="gender">
                                                            <option value="Married">--Select--</option>
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                          <option value="Others">Others</option>
                                                      </select>
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Maritial Status</label>
                                                    <select class="form-control" name="maritial_status">
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
                                                      <input type="text" name="present_add" style="color:#3931af" class="form-control" placeholder="Present Address">
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Permanent Address</label>
                                                      <input type="text" name="permanent_add" style="color:#3931af" class="form-control" placeholder="Permanent Address">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                            <label for="">Job Type</label>
                                                      <select class="form-control" name="job_type" id="gender">
                                                          <option value="Male">Select your Job type</option>
                                                          <option value="Male">Full Time</option>
                                                          <option value="Female">Part Time</option>
                                                          <option value="Others">Entry Level</option>
                                                          <option value="Others">High Level</option>
                                                      </select>
                                                    </div>
                                                    <div class="col">
                                                            <label for="">Expect Salary</label>
                                                            <input type="text" name="exp_salary" style="color:#3931af" class="form-control" placeholder="Expected Salary">
                                                    </div>
                                                      <br>
                                                    <div class="row">
                                                        <label for="Email"> Email </label>
                                                        <input type="email" name="email" class="form-control" placeholder="email" required>
                                                      </div>
                                            </div>
                                            
                                    
                                    </div>
                                    <div class="tab-pane" id="two">
                                            <div class="row">
                                                    <div class="col">
                                                        <label for="education">Level of Education 
                                                            </label>
                                                        <select required class="form-control" name="level_education" id="gender">
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
                                                        <select class="form-control" name="job_type" id="gender">
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
                                                        <select required class="form-control" name="board_education" id="gender">
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
                                                       <input type="text" name="institiute" class="form-control" placeholder="Instititue Name" required>
                                                        </select>
                                                      
                                                    </div>
                                                    
                                            </div>
                                    </div>
                                    <div class="tab-pane" id="three">
                                            <div class="row">
                                                    <div class="col">
                                                        <label for=""> Company Name</label>
                                                      <input type="text" name="company_name" style="color:#3931af" class="form-control" placeholder="Company Name">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">company Buisiness</label>
                                                      <input type="text" name="compnay_buisness" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                        <label for=""> Designation</label>
                                                      <input type="text" name="designation" style="color:#3931af" class="form-control" placeholder="Company Name">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">company Location</label>
                                                      <input type="text" name="compnay_loacation" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="col">
                                                        <label for=""> Employment Period From</label>
                                                      <input type="date" name="from_date" style="color:#3931af" class="form-control" placeholder="Start Date">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Employment Period till</label>
                                                      <input type="date" name="to_date" style="color:#3931af" class="form-control" placeholder="End Date">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                <p style="color: #000">Full-name: {{ $user_details->first_name}} {{ $user_details->last_name}}</p>
                    <p style="color: #000">Email : {{ $user_details->email}}</p>
                    <p style="color: #000">Mobile Number: {{ $user_details->phone}}</p>
                    <p style="color: #000">Blood Group: {{ $user_details->blood_group}}</p>
                    <p style="color: #000">Batch Number: {{ $user_details->batch_no}}</p>
                    <p style="color: #000">Admission Year: {{ $user_details->addmission_year}}</p>
                    <p style="color: #000">Passing Year: {{ $user_details->passing_year}}</p>
                    <p style="color: #000">Registration No: {{ $user_details->reg_no}}</p>
                    <p style="color: #000">Job Experience: {{ $user_details->experience_year}}</p>
                    <p style="color: #000">Job Skills: {{ $user_details->job_skill}} </p>
                    <p style="color: #000">Job Areas: {{ $user_details->job_cat_name}}</p>
                    
                    
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
                    <br>
                    <div>
                        <table style="border: 1px solid black;" class="table">
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
                              <br>
                              
               
                </div>
                    </div>
                   
                    <br>
                    <br>
                   
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                 
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
                    <table>
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12 ">
                                <nav>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                        <p id="demo">JavaScript can change HTML content.</p>
                                        <button type="button" onclick='document.getElementById("demo").innerHTML = "Hello JavaScript!"'>Click Me!</button>
                                        <button onClick="toggleDiv(2)">Try it 2</button>
                                        <button onClick="toggleDiv(3)">Try it 3</button>
                                        
                                        <div id="right-content">
                                          <div id="close">X</div>
                                          <div class="slide" id="div1">content 1</div>
                                          <div class="slide" id="div2">hey I'm content 2</div>
                                          <div class="slide" id="div3">Now it's content 3</div>
                                        <div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      
                                    <div class="jumbotron jumbotron-sm">
                                      <div class="container">
                                          <div class="row">
                                              <div class="col-sm-12 col-lg-12">
                                                  <h4 class="h1">
                                                     Send Message</h4>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="container">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="well well-lg">
                                              <form action="{{ URL::to('/user/message/sent') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              <label for="name">
                                                                  Select User</label>
                                                             <select style="border:1px solid #818182" name="sent_to_id" id="receiver_id" class="form-control">
                                                              <option value="0">Select a User </option>
                                                              @foreach ($users as $item)
                                                                  
                                                             <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                              @endforeach

                                                             </select>
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
                                            </div>
                                          
                                             </div>
                                         </div>
                                  
                                  </div>
                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                  <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                  </div>
                                </div>
                              
                            
                      </div>
                    </div>
              </div>
              
                    </table>
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
                            <section class="row wrapper">
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
                                  </section>
                          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>


<br>
<!-- Modal -->
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
                                    <input type="text" name="first_name" style="color:#3931af" value="{{ $cv_details->first_name}}" class="form-control" placeholder="First name">
                                   <input type="hidden" name="id" value="{{ $cv_details->id}}">
                                  </div>
                                    <div class="col">
                                            <label for="">Last Name</label>
                                      <input type="text" name="last_name" style="color:#3931af" value="{{ $cv_details->last_name}}" class="form-control" placeholder="Last name">
                                    </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                        <label for="">Nationality</label>
                                  <input type="text" name="nationality" style="color:#3931af" value="{{ $cv_details->nationality}}" class="form-control" placeholder="Nationality">
                                </div>
                                <div class="col">
                                        <label for="">National ID</label>
                                  <input type="text" name="na_id" style="color:#3931af" value="{{ $cv_details->na_id}}" class="form-control" placeholder="National ID NO">
                                </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                    <label for="">Father Name</label>
                              <input type="text" name="father_name" style="color:#3931af" value="{{ $cv_details->father_name}}" class="form-control" placeholder="Father Name">
                            </div>
                            <div class="col">
                                    <label for="">Mother Name</label>
                              <input type="text" name="mother_name" style="color:#3931af" value="{{ $cv_details->mother_name}}" class="form-control" placeholder="Mother Name">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col">
                                    <label for="">Date of Birth</label>
                              <input type="date" name="dob" style="color:#3931af" class="form-control" placeholder="Date Of Birth">
                            </div>
                            <div class="col">
                                    <label for="">Phone Number</label>
                              <input type="text" name="mobile" style="color:#3931af" value="{{ $cv_details->mobile}}" class="form-control" placeholder="Phone Number">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                                <label for="">Gender</label>
                          <select class="form-control" name="gender" id="gender">
                                <option value="Married">--Select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>
                          </select>
                        </div>
                        <div class="col">
                                <label for="">Maritial Status</label>
                        <select class="form-control" name="maritial_status">
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
                      <input type="text" name="present_add" style="color:#3931af" value="{{ $cv_details->present_add}}" class="form-control" placeholder="Present Address">
                    </div>
                    <div class="col">
                            <label for="">Permanent Address</label>
                      <input type="text" name="permanent_add" style="color:#3931af" value="{{ $cv_details->permanent_add}}" class="form-control" placeholder="Permanent Address">
                    </div>
            </div>
            <br>
            <div class="row">
                    <div class="col">
                            <label for="">Job Type</label>
                      <select class="form-control" name="job_type" id="gender">
                          <option value="Male">Select your Job type</option>
                          <option value="Male">Full Time</option>
                          <option value="Female">Part Time</option>
                          <option value="Others">Entry Level</option>
                          <option value="Others">High Level</option>
                      </select>
                    </div>
                    <div class="col">
                            <label for="">Expect Salary</label>
                            <input type="text" name="exp_salary" style="color:#3931af" value="{{ $cv_details->exp_salary}}" class="form-control" placeholder="Expected Salary">
                    </div>
            </div>
            <br>
            <div class="tab-pane" id="two">
                <div class="row">
                        <div class="col">
                            <label for="education">Level of Education 
                                </label>
                            <select required class="form-control" name="level_education" id="gender">
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
                            <select class="form-control" name="job_type" id="gender">
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
                        <div class="col">
                            <label for="">Expect Salary</label>
                            <input type="email" name="email" style="color:#3931af" value="{{ $cv_details->email}}" class="form-control" placeholder="Put your email">
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

    <style>
    
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px ;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #000;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #000;
}


    </style>

    <script>
     $('#myForm a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })
    </script>
<script>

function toggleDiv(divNum) {
    
    $("#close").hide();
    $(".slide").animate({right:'-200'},350);
    if($("#div"+divNum)) {
        
        $("#div"+divNum).animate({right:'0'},350,function(){$("#close").show();});
    }
}

$(document).ready(function(){
   $("#close").on("click",function(e){
      $(".slide").animate({right:'-200'},350);
      $(this).hide()
   })

})
.slide {
  width:200px;
  height:100%;
  position:absolute;
  right:-200px;
  top:0;
  background:#d2d2d2;
}

#close {
  position:absolute;
  right:10px;
  top:10px;
  z-index:10;
  display:none;
}

#right-content {
  position:absolute;
  right:0;
  top:0;
  overflow:hidden;
  width:200px;
  height:100%;
}
</script>
@endsection
