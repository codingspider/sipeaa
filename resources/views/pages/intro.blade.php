@extends('layouts.app')

@section('content')
@section('style')
    
@endsection

@php

$events = DB::table('events')->get();
    
@endphp
                
			<!-- Banner/Slider -->
			<div id="header" class="banner header-slider">
                <div class="single-slide light row-vm" style="background-image:url(  {{ asset('images/slider-bg.png')}} )">
                        <div class="container">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="animate-bottom delayms5">Dummy Text  <br /><span class="ucap">YOU CAN TRUST</span></h1>
                                        <p class="lead animate-bottom delayms7">Sed ut persp iciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam, eaque ipsa quae ab illo inven tore veri.</p>
                                        <ul class="btns animate-bottom delayms9">
                                            <li><a href="#" class="btn">View more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide light row-vm" style="background-image:url({{ asset('images/Banner-1.png')}})">
                        <div class="container">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 text-center">
                                            <h1 class="animate-bottom delayms5">Dummy Text  <br /><span class="ucap">YOU CAN TRUST</span></h1>
                                        <p class="lead animate-bottom delayms7">Sed ut persp iciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam, eaque ipsa quae ab illo inven tore veri.</p>
                                        <ul class="btns animate-bottom delayms9">
                                            <li><a href="#" class="btn">View more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner/Slider -->
            </header>
            <!-- End Header -->
             
      
              
               <!--Section -->
               <div class="section section-pad has-bg light dark-filter">
                   <div class="imagebg has-parallax">
                    <img src="images/calc-bg.jpg" alt="calc-bg">
                </div>
                   <div class="container">
                       <div class="row row-vm">
                           <div class="col-md-5">
                            <div class="text-block">
                                    <div class="panel-heading">Upcoming events on calender</div>
 
                                    <div class="panel-body">
                                        {!! $calendar->calendar() !!}
                                    </div>
                                
                            </div>
                           </div>

                           
                           <div class="col-md-6 col-md-offset-1">
                               <div class="calculator">
                                    <div class="">
                                            <div class="testimonial-carousel has-carousel" data-items="1" data-loop="true" data-dots="true" data-auto="true">
                                                @foreach ($events as $item)
                                               
                                                <div class="testimonial-item">
                                                    <div class="client-photo">
                                                    <p>{{ $item->title }}</p>
                                                    <a href="{{ URL::to('/events/details/page',$item->id) }}">
                                                   <img src="{{ $item->images}}" alt="client">
                                                   </a>
                                                    </div>
                                                    <div class="client-info">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
        
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
               <div class="section section-pad">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 res-m-bttm">
                             <div class="row text-center">
                                 <div class="col-sm-6">
                                     <div class="blog-post shadow round">
                                         <div class="post-thumb"><a href="blog-single.html"><img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post"></a></div>
                                         <div class="post-entry">
                                             <div class="post-meta"><span>Posted 03 Dec, 2017</span></div>
                                             <h5><a href="blog-single.html">Working Hard to Keep Pace with very heigh Demand</a></h5>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore.</p>
                                             <a href="blog-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                         </div>
                                     </div>
                                     <div class="gaps size-3x"></div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="blog-post shadow round">
                                         <div class="post-thumb"><a href="blog-single.html"><img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post"></a></div>
                                         <div class="post-entry">
                                             <div class="post-meta"><span>Posted 03 Dec, 2017</span></div>
                                             <h5><a href="blog-single.html">Black Friday: Bitcoins the biggest deal on from today</a></h5>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore.</p>
                                             <a href="blog-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                         </div>
                                     </div>
                                     <div class="gaps size-3x"></div>
                                 </div>
                            
                             </div>
                             
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
                                     <h5 class="wgs-title">New Jobs </h5>
                                     <div class="wgs-content">
                                         <div class="wgs-post-single">
                                             <div class="wgs-post-thumb">
                                                 <img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post-thumb">
                                             </div>
                                             <div class="wgs-post-entry">
                                                 <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                                 <span class="wgs-post-meta">December 19, 2017</span>
                                             </div>
                                         </div>
                                         <div class="wgs-post-single">
                                             <div class="wgs-post-thumb">
                                                 <img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post-thumb">
                                             </div>
                                             <div class="wgs-post-entry">
                                                 <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                                 <span class="wgs-post-meta">December 19, 2017</span>
                                             </div>
                                         </div>
                                         <div class="wgs-post-single">
                                             <div class="wgs-post-thumb">
                                                 <img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post-thumb">
                                             </div>
                                             <div class="wgs-post-entry">
                                                 <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                                 <span class="wgs-post-meta">December 19, 2017</span>
                                             </div>
                                         </div>
                                         <div class="wgs-post-single">
                                             <div class="wgs-post-thumb">
                                                 <img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1980519/1400/997/m1/fpnw/wm0/job-point-logo-01-.jpg?1518326143&s=2e6928862f4abd9f041efb57385aa87e" alt="post-thumb">
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
                <!--End Section -->
               
            
            
            {!! $calendar->script() !!}
@endsection