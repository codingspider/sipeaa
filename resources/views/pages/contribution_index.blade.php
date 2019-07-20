@extends('layouts.app2')
@section('title', 'Job Posts')

@section('content')

<p class="alert-success text-center">
        <?php
            
        $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        } 
            ?>

@php

$data =DB::table('members')->get();
$blood = DB::table('members')->orderBy('id', 'DESC')->get();

$job_areas = DB::table('job_categories')->get();

@endphp


<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">

                    <!-- Default form register -->
<form action="{{ URL::to('/make/contribution') }}" method="POST">
  @csrf
  <h3 class="text-center">Members Contribution </h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Select Member</label>
    <select style=" border: 1px solid black;" name="members" class="form-control" required="">
      @foreach($data as $value)
      <option value="{{ $value->first_name }} {{ $value->last_name }}">{{ $value->first_name }} {{ $value->last_name }}</option>
      @endforeach
    </select>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount:</label>
    <input type="text" style=" border: 1px solid black;" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Amount:" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Payment Date:</label>
    <input type="date" style=" border: 1px solid black;" class="form-control" name="date" id="exampleInputPassword1" required="">
  </div>
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- Default form register -->
                    
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                        <div class="wgs-search">
                            <div class="wgs-content">
                                <div class="form-group">
                                        <p class="text-center"> Select Blood Group </p>
                                        <form method="post" action="{{URL::to('/search/result') }}">
                                            @csrf
                                        <select style=" border: 1px solid black;" id="search" name="blood_group" onchange="this.form.submit()" class="form-control">
                                    
                                                      <option selected>Select</option>
                                                      @foreach( $blood as $b )
                                                      <option value="{{ $b->blood_group }}">{{ $b->blood_group }}</option>
                                                      @endforeach
                                                    </select>
                                    </form>
                                </div>
                            </div>
                            <div class="gaps size-1x"></div>
                        </div>
                        <!-- Each Widget -->
                        <div class="wgs-post">
                            <div class="wgs-content">
                                    <div class="form-group">
                                            <p class="text-center"> Select Job Areas </p>
    <form method="post" action="{{URL::to('/search/result/job/areas') }}">
        @csrf
    <select style=" border: 1px solid black;" id="search" name="job_areas" onchange="this.form.submit()" class="form-control">

                  <option selected>Select</option>
                  @foreach( $job_areas as $jobs )
                  <option value="{{ $jobs->id }}">{{ $jobs->category_name }}</option>
                  @endforeach
                </select>
</form>
                                        </div>
                            </div>
                            <div class="gaps size-2x"></div>
                        </div>
                        <!-- End Widget -->
                        
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- End Section -->
    <br>
    <br>
    <br>
@endsection