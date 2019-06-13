@extends('layouts.app2')
@section('title', 'Job Details')
@section('content')

@php
$data_jobs = DB::table('jobs')->get();
foreach ($data_jobs as  $jobs) {
  # code...
}
   
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
                            $id = Auth::id();
                            

                    $status = DB::table('job_applies')->get(); 
                    foreach ($status as  $value) {
                      # code...
                    }
                    
                @endphp

                <div class="col-md-4 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                       @if($value->user_id == $id && $value->status == 1 && $value->job_id == $data->id)
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
                                  <form action="{{ URL::to('/job/application/success') }}" method="POST">
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

                                    <input type="hidden" name="company_name" value="{{ $data->company_name }}">
                                    <input type="hidden" name="job_position" value="{{ $data->job_position }}">
                                    <input type="hidden" name="category_name" value="{{ $data->category_name }}">
                                    <input type="hidden" name="job_title" value="{{ $data->title }}">
                                    <input type="hidden" name="user_id" value="{{ $id }}">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="job_id" value="{{ $data->id }}">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-success">Apply</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <br>
                              <br>
                              <div class="form-group">
                                <h3> Search Employees </h3>
                                <form method="POST" action="{{ URL::to('/search/employes') }}">
                                  @csrf
                                    <select name="cate_id" class="form-control" id="sel1">
                                  <option> - select a job category-</option>
                                        @foreach ($data_jobs as $item)
                                            
                                    <option value="{{ $item->id}}">{{ $item->category_name}}</option>
                                        @endforeach
                                                    
                                          </select>
                                          <br>
                                        <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <!-- End Section -->

@endsection