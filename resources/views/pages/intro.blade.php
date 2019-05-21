@extends('master')

@section('content')
@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
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
               
               <!--Section -->
               <div class="section section-pad">
                   <div class="container">
                       <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <h2 class="heading-section">Why choose Us</h2>
                                <p>Sed ut perspi ciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam</p>
                            </div>
                        </div>
                       </div>
                       <div class="gaps size-3x"></div>
                    <div class="row text-center row-vm">
                        <div class="col-md-4 res-m-bttm-lg">
                            <div class="box-alt">
                                <span class="pe pe-7s-server"></span>
                                <h4>Payment Options</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-note"></span>
                                <h4>Legal Compliance</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-airplay"></span>
                                <h4>Cross-Platform Trading</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                        <div class="col-md-4 res-m-bttm-lg">
                            <div class="box-alt">
                                <span class="pe pe-7s-lock"></span>
                                <h4>Strong Security</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt img">
                                <img src="images/square-md-a.png" alt="square">
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-cash"></span>
                                <h4>Competitive Commissions</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-alt">
                                <span class="pe pe-7s-global"></span>
                                <h4>World Coverage</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-graph"></span>
                                <h4>Advanced Reporting</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-graph1"></span>
                                <h4>Margin Trading</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                    </div>
                   </div>
               </div>
               <!--End Section -->
               

            
              
               <!-- Section -->
            <div class="section section-pad-md bg-grey">
                <div class="container">
                    <div class="content row">
                        <div class="owl-carousel has-carousel no-dots"  data-items="6" data-loop="true" data-dots="false" data-auto="false">
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo1.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo2.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo3.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo4.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo5.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo6.png"></div>
                        </div>
    
                    </div>
                </div>	
            </div>
            <!-- End Section -->

            {!! $calendar->script() !!}
@endsection