@extends('layouts.app2')
@section('title', 'Training Demand')

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
    
    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();
@endphp
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">

                    <!-- Default form register -->
<form action="{{ URL::to('/training/demand/post') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <h3 class="text-center">Training Demand Form</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Training Need *</label>
     <input type="text" style="border: 1px solid #000;" class="form-control" name="training_need" required="">
    </div>
    

  <div class="form-group">
    <label for="exampleInputPassword1">Demand Date *</label>
    <input style="border: 1px solid #000;" type="date" class="form-control" name="form_date" required="">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Description:</label>
    <div class="form-group">
  <textarea name="description" style="border: 1px solid #000;" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" required></textarea>
</div>
  </div>
<input type="hidden" name="id" value="{{Auth::id()}}">
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Post Now</button>
</form>
<!-- Default form register -->
                    
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                        <div class="wgs-search">
                            <div class="wgs-content">
                                <div class="form-group">
                                    <p class="text-center"> Select Job Areas </p>
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
                            <div class="gaps size-1x"></div>
                        </div>
                        <!-- Each Widget -->
                        <div class="wgs-post">
                            <div class="wgs-content">
                                    <div class="form-group">
                                        <p class="text-center"> Select Blood Group </p>
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