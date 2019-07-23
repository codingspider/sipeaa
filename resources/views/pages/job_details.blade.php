@extends('layouts.app2')
@section('title', 'Job Details')
@section('content')

@php
$data_jobs = DB::table('jobs')->get();
foreach ($data_jobs as  $jobs) {
  # code...
}
   
@endphp
@php
    //$data = DB::table('job_location')->orderBy('id', 'DESC')->get();

    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();

    $id = Auth::id();
    $cv = DB::table('cv')->where('user_id', $id)->first();

@endphp

@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif
<br>

<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">

                    <div class="post post-single">
                        <div class="post-thumb">
                            <img alt="" src="{{ URL::asset("images/{$data->company_image}") }}" height="300" width="450px">
                        </div>
                        <div class="post-meta">
                            <span class="pub-date text-danger"><em class="fa fa-calendar" aria-hidden="true"></em>  Job Posted at  {{ $data->created_at }} </span>
                        </div>
                        <br>
                        <div class="post-entry">
                        <h3>Job Title: {{ $data->title }}</h3>
                        <br>
                            <h4>Company: {{ $data->company_name }}</h4>
                            <p> <strong> Description: </strong> {{ $data->job_details }} </p>
                            <p> <strong>  Vacancy: </strong> {{ $data->no_vacancy }} </p>
                            <p> <strong>  Position: </strong> {{ $data->job_position }} </p>
                            <p> <strong>  Category: </strong> {{ $data->category_name }} </p>
                            <p> <strong>  Type: </strong> {{ $data->job_type }} </p>
                            <p> <strong> Experience & Other Requirements: </strong> {{ $data->job_experience }} </p>
                            <p> <strong> Salary Range : </strong> {{ $data->salary }} </p>
                            <p class="btn btn-warning">Application Deadline : {{ $data->application_deadline }} </p>
                            <br>
                            <br>
                            <p> <strong> Instruction :</strong> {{ $data->application_instruction }} </p>
                          
                        </div>
                    </div>
                    
                </div>

                @php
                use Illuminate\Support\Facades\Auth;
                    $status = DB::table('job_applies')->select('user_id')->where('job_id',$data->id)->first(); 
                    $user_type = DB::table('users')->where('id',Auth::id())->first(); 
                @endphp

                <div class="col-md-4 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                      @if($user_type->user_type == 'member')
                        @if($status->user_id == Auth::id())
                        <p class="btn btn-warning">You already applied to this job ! </p> 
                          @else 
                          <p class="text-center">
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModal">
                                    Apply Now 
                            </button>
                          </p>
                  
                  <p class="text-center">or </p>
                  <p class="text-center">Send Cv to admin@sipeaa.org </p>
                        @endif 
                        @else 
                        @endif

                        <!-- End Widget -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Online Job Application</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                              
               <form action="{{ URL::to('/job/application/success') }}" method="POST" onsubmit="document.getElementById('myButton').disabled=true;
document.getElementById('myButton').value='Submitting, please wait...';">
                                    @csrf
                                    <div class="modal-body col-md-12">
                                            <table class="table table-dark">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Company Name:</th>
                                                        <th scope="col">Position Applied:</th>
                                                        <th scope="col">Job Category :</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>{{ $data->company_name }}</td>
                                                        <td>{{ $data->job_position }}</td>
                                                        <td>{{ $data->category_name }} </td>
                                                      </tr>
                                                      
                                                    </tbody>
                                                  </table>
                                                  <label> Expected Salary : 
                                                <input type="text" name="expected_salary">
                                                  </label>
                                    </div>
                                    <input type="hidden" name="job_id" value="{{ $data->id }}">
                                    <input type="hidden" name="cv" value="{{ $cv->upload_file }}">

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" id="myButton" class="btn btn-success">Apply</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <br>
                              <br>
                              <div class="form-group">
                                <h3> Search By Blood Group </h3>
                                <form method="post" action="{{URL::to('/search/result') }}">
                                  @csrf
                              <select id="search" name="blood_group" onchange="this.form.submit()" class="form-control">
                          
                                            <option selected>Select</option>
                                            @foreach( $blood as $b )
                                            <option value="{{ $b->blood_group }}">{{ $b->blood_group }}</option>
                                            @endforeach
                                          </select>
                          </form>
                              </div>
                              <div class="form-group">
                                <h3>Search By JOb Area</h3>
                                <form method="post" action="{{URL::to('/search/result/job/areas') }}">
                                  @csrf
                              <select id="search" name="job_areas" onchange="this.form.submit()" class="form-control">
                          
                                            <option selected>Select</option>
                                            @foreach( $job_areas as $jobs )
                                            <option value="{{ $jobs->id }}">{{ $jobs->category_name }}</option>
                                            @endforeach
                                          </select>
                          </form>
                              </div>
                                
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <!-- End Section -->

@endsection