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
<p class="text-center">Your Search Results !</p>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
            @if(!$patients->isEmpty())
                <div class="col-md-8 res-m-bttm">
                 <div class="row text-center">

                        @foreach ($patients as $item)
                     <div class="col-sm-6">
                         <div class="blog-post shadow round">
                             
                         <div class="post-thumb"><a href="#"><img src="{{ asset("images/".$item->images)}}"></a></div>
                             <div class="post-entry">
                                 <div class="post-meta"><span>{{ $item->first_name }} {{ $item->last_name }}</span></div>
                                 <h5><a href="#">{{ $item->user_id  }}</a></h5>
                                 <h5><a href="#">{{ $item->phone  }}</a></h5>
                                 <a href="#" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                             </div>
                         </div>
                         <div class="gaps size-3x"></div>
                     </div>
                     @endforeach
                 </div>
                 
             </div>
             @else
             <div class="col-sm-8">
                      <h4> You Have 0 Result !</h4>
                     </div>
            @endif
            <br>
             <div class="col-md-3 col-md-offset-1">
                 <div class="sidebar-right wgs-box">
                     
                     
                 </div>
             </div>
            </div>
        </div>
    </div>

@endsection