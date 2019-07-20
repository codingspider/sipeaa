@extends('layouts.app2')
@section('title', 'Home')
@section('content')

@php

$events = DB::table('events')->get();
$side_events = DB::table('side_slider_events')->get();

$collection = DB::table('jobs')->orderBy('id', 'desc')->take(3)->get();

    
@endphp
  <div class="container">
                <div class="row py-3 my-3">
                    <div class="col-sm-12">
                        <div class="slider">
                            <div id="owl-demo">
                                @foreach($events as $value)
                                  <div class="item"><img class="responsive" src="{{$value->images}}" alt="Responsive image">
                                    <div class="carousel-caption">
                                    <a href="{{ URL::to('/events/details', $value->id )}}" target="_blank"><button type="button" style="color:blue" alt="Responsive image" class="btn btn-default">{{ $value->title }}</button></a>
                                      </div>
                                  </div>
                                @endforeach
                              </div>
                                        
                        </div>
                    </div>
                    <div style="background:#d9cef2; border-style: solid;" class="col-md-6" data-appear-animation="fadeInRightShorter">
                      <div class="slider">
                        <div id="my_car">
                            @foreach($side_events as $value)
                              <div class="item"><img class="responsive" src="{{$value->images}}" alt="Responsive image">
                                <div class="carousel-caption">
                                <a href="{{ URL::to('/side/slider/events/details', $value->id )}}" target="_blank"><button type="button" class="btn btn-default">{{ $value->title }}</button></a>
                                  </div>
                              </div>
                            @endforeach
                          </div>
                                    
                    </div>
                       
                    </div>
                    <div style="background:#d9cef2; color:aqua" class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                        <h2 class="text-color-dark font-weight-normal text-6 mb-2">Up Coming  <strong class="font-weight-extra-bold">Events On Callendar</strong></h2>
                        <div id='calendar' style="width: 100%; display: inline-block;">
                                {!! $calendar->calendar() !!}
                            </div>
                    </div>
                </div>
            </div>
        <section class="section appear-animation" data-appear-animation="fadeIn">
            <h3 class="text-center">Latest Job Post</h3>
                <div class="container">
             
                        <div id="products" class="row view-group">
                            @foreach ($collection as $item)

                                    <div  class="item col-xs-4 col-lg-4">
                                        <div style="background:cadetblue"  class="thumbnail card">
                                            <div class="img-event">
                                                <a href="{{ URL::to('job/details/page/'.$item->id )}}">
                                                <img class="group list-group-image img-fluid center responsive" src="{{ URL::asset('/images/'.$item->company_image) }}" id="parent" alt="" />
                                                </a>
                                            </div>
                                            <div class="caption card-body">
                                                <a href="{{ URL::to('job/details/page/'.$item->id )}}">  <h4 class="group card-title inner list-group-item-heading text-center">
                                                        {{ $item->title}}</h4></a>
                                              
                                                
                                                
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row  center-block">
                                                 
                                                <div class="col-xs-12 col-md-6 center-block">
                                                    <a class="btn btn-success center-block" href="{{ URL::to('job/details/page/'.$item->id )}}">Read More</a>
                                                </div>
                                            </div>
                                    </div>
                                    <br>
                            @endforeach
                                    
                                </div>

                    </div>
            
         
        </section>

      
        
       
    </div>
    {!! $calendar->script() !!}


<script type="text/javascript">
    $(document).ready(function() {
      
  $("#owl-demo").owlCarousel({
     
      autoPlay: 4000, //Set AutoPlay to 3 seconds
 
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1]
  });
  });
</script>


<style type="text/css">
#owl-demo .owl-item img{
  display: inline-block;  max-width: 100%;  height:400px;    margin-bottom: 30px;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
#parent {
    display:table-cell;
    width : 700px;
    height : 200px;
    background-color: black;
    vertical-align:middle;
    text-align:center;
}
</style>



<script type="text/javascript">
    $(document).ready(function() {
      
  $("#my_car").owlCarousel({
     
      autoPlay: 4000, //Set AutoPlay to 3 seconds
 
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1]
  });
// optional
$('#blogCarousel').carousel({
				interval: 5000
		});
  
  });
</script>


<style type="text/css">
#my_car .owl-item img{
  display: inline-block;  max-width: 100%;  height:350px;    
}
.blog .carousel-indicators {
	left: 0;
	top: auto;
    bottom: -40px;

}

/* The colour of the indicators */
.blog .carousel-indicators li {
    background: #a3a3a3;
    border-radius: 50%;
    width: 8px;
    height: 8px;
}

.blog .carousel-indicators .active {
background: #707070;
}
</style>

@endsection