@extends('layouts.app2')
@section('title', 'All Jobs')
@section('content')

@php
    $data = DB::table('job_location')->orderBy('id', 'DESC')->get();

    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();

@endphp
<br>
<br>

<br>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">
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
<br>
<br>
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
             <div class="col-md-3 col-md-offset-1">
                 <div class="sidebar-right wgs-box">
                     <div class="wgs-search">
                         <div class="wgs-content">
                             <div class="form-group">
                                 <input type="text" class="form-control"  placeholder="Search...">
                                 <button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                             </div>
                         </div>
                         <div class="gaps size-1x"></div>
                     </div>
                     <!-- Each Widget -->
                     <div class="wgs-post">
                         <h5 class="wgs-title">Recent Blog</h5>
                         <div class="wgs-content">
                             <div class="wgs-post-single">
                                 <div class="wgs-post-thumb">
                                     <img src="images/post-thumb-sm-a.jpg" alt="post-thumb">
                                 </div>
                                 <div class="wgs-post-entry">
                                     <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                     <span class="wgs-post-meta">December 19, 2017</span>
                                 </div>
                             </div>
                             <div class="wgs-post-single">
                                 <div class="wgs-post-thumb">
                                     <img src="images/post-thumb-sm-b.jpg" alt="post-thumb">
                                 </div>
                                 <div class="wgs-post-entry">
                                     <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                     <span class="wgs-post-meta">December 19, 2017</span>
                                 </div>
                             </div>
                             <div class="wgs-post-single">
                                 <div class="wgs-post-thumb">
                                     <img src="images/post-thumb-sm-c.jpg" alt="post-thumb">
                                 </div>
                                 <div class="wgs-post-entry">
                                     <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                     <span class="wgs-post-meta">December 19, 2017</span>
                                 </div>
                             </div>
                             <div class="wgs-post-single">
                                 <div class="wgs-post-thumb">
                                     <img src="images/post-thumb-sm-d.jpg" alt="post-thumb">
                                 </div>
                                 <div class="wgs-post-entry">
                                     <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                     <span class="wgs-post-meta">December 19, 2017</span>
                                 </div>
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

@endsection