@extends('layouts.app')
@section('title', 'Job Details')
@section('content')

@php
$data_jobs = DB::table('job_categories')->get();
    
@endphp

@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif


<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-7 res-m-bttm">

                    <div class="post post-single">
                        <div class="post-thumb">
                            <img alt="" src="{{ URL::asset("images/{$products->company_image}") }}" height="300" width="450px">
                        </div>
                        <div class="post-meta">
                            <span class="pub-date"><em class="fa fa-calendar" aria-hidden="true"></em>Job Posted at  {{ $products->created_at }} </span>
                        </div>
                        <br>
                        <div class="post-entry">
                        <h3>Job Title: {{ $products->title }}</h3>
                        <br>
                            <h4>Company: {{ $products->company_name }}</h4>
                            <p> <strong> Description: </strong> {{ $products->job_details }} </p>
                            <p> <strong>  Vacancy: </strong> {{ $products->no_vacancy }} </p>
                            <p> <strong>  Position: </strong> {{ $products->job_position }} </p>
                            <p> <strong>  Category: </strong> {{ $products->category_name }} </p>
                            <p> <strong>  Type: </strong> {{ $products->job_type }} </p>
                            <p> <strong> Experience & Other Requirements: </strong> {{ $products->job_experience }} </p>
                            <p> <strong> Salary Range : </strong> {{ $products->salary }} </p>
                            <p class="btn btn-warning">Application Deadline : {{ $products->application_deadline }} </p>
                            <br>
                            <br>
                            <p> <strong> Instruction :</strong> {{ $products->application_instruction }} </p>
                          
                            
                        </div>
                    </div>
                    
                </div>

                @php
                use Illuminate\Support\Facades\Auth;
                            $id = Auth::id();
                    $status =DB::table('job_applies')->where('job_title', $products->title)->count();
                @endphp

                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                       @if($status == 0)
                        <div class="wgs-post">
                                <button type="button" class="btn btn-success center-block" data-toggle="modal" data-target="#exampleModal">
                                        Apply Now 
                                      </button>
                        </div>
                        
                        <p class="text-center">or </p>
                        <p class="text-center">Send Cv to admin@sipeaa.org </p>

                        @else 
                        <p class="btn btn-warning">You already applied to this job ! </p>
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
                                    <div class="modal-body">
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
                                                        <td>{{ $products->company_name }}</td>
                                                        <td>{{ $products->job_position }}</td>
                                                        <td>{{ $products->category_name }} </td>
                                                      </tr>
                                                      
                                                    </tbody>
                                                  </table>
                                                  <label> Expected Salary : 
                                                <input type="text" name="expected_salary">
                                                  </label>
                                    </div>

                                    <input type="hidden" name="company_name" value="{{ $products->company_name }}">
                                    <input type="hidden" name="job_position" value="{{ $products->job_position }}">
                                    <input type="hidden" name="category_name" value="{{ $products->category_name }}">
                                    <input type="hidden" name="job_title" value="{{ $products->title }}">
                                    <input type="hidden" name="user_id" value="{{ $id }}">
                                    <input type="hidden" name="status" value="1">
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
                                        <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <!-- End Section -->

@endsection