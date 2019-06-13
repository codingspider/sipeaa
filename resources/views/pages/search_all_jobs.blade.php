@extends('layouts.app2')

@section('content')

@php
    $location = DB::table('job_location')->get();
@endphp

<div class="container">
        <div class="row">    
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by Location </span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($location as $item)
                                
                        <li><a href="{{ URL::to('search/by/location', $item->id) }}">{{ $item->name }}</a></li>
                          @endforeach

                          
                        </ul>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>
    
    
    	<!--Section -->
        <div class="section section-pad">
                <div class="container">
                    <div class="row text-center">
                            @foreach ($data as $item)

                        <div class="col-md-6 col-sm-6">
                                
                            <div class="service-box shadow round">
                                <div class="service-thumb">
                                <a href="service-single.html"><img src="{{ URL::asset("images/{$item->company_image}") }}" height="220" width="300px" alt="service"></a>
                                </div>
                                <div class="service-entry">
                                <h5>{{ $item->company_name }}</h5>
                                <p>{{ $item->job_details }}</p>
                                    <a href="service-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                </div>
                            </div>
                         <div class="gaps size-3x"></div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <!--End Section -->
@endsection