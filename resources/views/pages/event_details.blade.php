@extends('layouts.app2')
@section('title', 'Events Details')

@section('content')
    
@foreach ($data as $item)
    
@endforeach
@php
    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

$job_areas = DB::table('job_categories')->get();
@endphp
<br>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">

                    <div class="post post-single">
                        <div class="post-thumb">
                        <img alt="" src="{{ URL::asset( $item->images) }}"  style="width:500px; height:300;">
                        </div>
                        <div class="post-meta">
                            <span class="pub-date ">Event Date <em class="fa fa-calendar" aria-hidden="true"></em>  {{ $item->start_date }} </span>
                        </div>
                        <div class="post-entry">
                            <h3>{{ $item->title }}</h3>
                            <p> {{ $item->short_description }} </p>
                        </div>
                        <div class="post-entry">
                                <p> {{ $item->description }} </p>
                            </div>
                    </div>
                    
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                        <div class="wgs-search">
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
                            <div class="gaps size-1x"></div>
                        </div>
                        <!-- Each Widget -->
                        <div class="wgs-post">
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
                            <div class="gaps size-2x"></div>
                        </div>
                        <!-- End Widget -->
                        
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <!-- End Section -->
    
@endsection