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


    $cv_details = DB::table('online-cv')->where('user_id', $id)->orderBy('id', 'desc')->first();
    $users = DB::table('users')->where('approve', 1)->get();
    $cms_users = DB::table('cms_users')->where('id_cms_privileges', 1)->get();
    
    $unread_messages = DB::table('messages')
          ->join('users', 'users.id', '=', 'messages.sent_to_id')
          ->select('messages.*','users.name as uname' )
          ->where('sent_to_id', Auth::id())
          ->where('notify_status', 0)
          ->get();
  
    
    $user_type = DB::table('users')->where('approve', 1)->where('id', $id)->first();

    $employe_profile = DB::table('users')
    ->join('employee', 'employee.user_id', '=', 'users.id')
    ->select('users.*', 'employee.*')
    ->where('approve', 1)->where('users.id', $id)->first();



    $job_posted = DB::table('jobs')->where('user_id', $id)->get();


    foreach ($users as  $value) {
   
    }

   
@endphp
<br>
<br>


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

<div class="container">
      <div class="row">
      
          <div style="border-style: dotted;" class="col-md-6">
              <div class="profile-img">
              <img src="{{ URL::asset('/files/'.$employe_profile->images ) }}" style="width: 235px; height: 200;" alt=""/>
              <div class="file btn btn-lg btn-primary">
                  Change Photo
              <form action="{{ URL::to('/update/profile/picture/employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_images" value="{{$valupic->images}}">
                <input type="hidden" name="user_id" value="{{ $id }}">

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
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" style="color:#000" aria-selected="false">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"  style="color:#000" aria-selected="false">Job Posted</a>
                      </li>
                  
                      <li class="nav-item">
                          <a class="nav-link" id="job-tab" data-toggle="tab" href="#job" role="tab" aria-controls="job"  style="color:#000" aria-selected="false">Total Application</a>
                      </li>
                      <br><br><br>
                      <div style="width:400px;">
                            <div style="float: left; width: 130px"> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Edit Profile 
                                            </button>
                            </div>
                         
                        </div>
                  </ul>
              </div>
          </div>





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
          <div class="col-md-6">
                <div class="container">
                        
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
          <div class="col-md-6">
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

<script>
$('#myForm a').click(function (e) {
e.preventDefault();
$(this).tab('show');
})
</script>


@endsection