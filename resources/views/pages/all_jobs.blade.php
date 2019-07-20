@extends('layouts.app2')
@section('title', 'All Jobs')
@section('content')

@php
    $location = DB::table('job_location')->orderBy('id', 'DESC')->get();
@endphp
@php
    // $data = DB::table('job_location')->orderBy('id', 'DESC')->get();

    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();

@endphp
<br>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">
                 <div class="row text-center">
                        @foreach ($data as $item)
                     <div class="col-sm-6">
                         <div class="blog-post shadow round">
                         <div class="post-thumb"><a href="{{ URL::to('/job/details/page', $item->id) }}"><img src="{{ URL::asset("images/{$item->company_image}") }}" height="220" width="300px" alt="post"></a></div>
                             <div class="post-entry">
                                 <div class="post-meta"><span>{{ $item->company_name }}</span></div>
                                 <h5><a href="{{ URL::to('/job/details/page', $item->id) }}">{{ $item->title  }}</a></h5>
                                 <a href="{{ URL::to('/job/details/page', $item->id) }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                             </div>
                         </div>
                         <div class="gaps size-3x"></div>
                     </div>
                     @endforeach
                 </div>
                 
             </div>
             <div class="col-md-3 col-md-offset-1">
                 <div class="sidebar-right wgs-box">
                
                     <!-- Each Widget -->
                     <div class="wgs-post">
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
                     <!-- End Widget -->
                     
                                        
                 </div>
             </div>
            </div>
        </div>
    </div>

@endsection