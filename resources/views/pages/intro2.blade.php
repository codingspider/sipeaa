@extends('layouts.app2')
@section('title', 'Home')
@section('content')

@php

$events = DB::table('events')->get();
$side_events = DB::table('side_slider_events')->get();

$blog_etc_posts = DB::table('blog_etc_posts')->get();
    
@endphp
  <div class="container">
                <div class="row py-5 my-5">
                    <div class="col-sm-12">
                        <div class="slider">
                            <div id="owl-demo">
                                @foreach($events as $value)
                                  <div class="item"><img src="{{$value->images}}" alt="Owl Image">
                                    <div class="carousel-caption">
                                    <a href="{{ URL::to('/events/details', $value->id )}}" target="_blank"><button type="button" class="btn btn-default">{{ $value->title }}</button></a>
                                      </div>
                                  </div>
                                @endforeach
                              </div>
                                        
                        </div>
                    </div>
                    <div class="col-md-6" data-appear-animation="fadeInRightShorter">
                      <div class="slider">
                        <div id="my_car">
                            @foreach($side_events as $value)
                              <div class="item"><img src="{{$value->images}}" alt="Owl Image">
                                <div class="carousel-caption">
                                <a href="{{ URL::to('/events/details', $value->id )}}" target="_blank"><button type="button" class="btn btn-default">{{ $value->title }}</button></a>
                                  </div>
                              </div>
                            @endforeach
                          </div>
                                    
                    </div>
                       
                    </div>
                    <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                        <h2 class="text-color-dark font-weight-normal text-6 mb-2">Up Coming  <strong class="font-weight-extra-bold">Events On Callendar</strong></h2>
                        <div id='calendar' style="width: 100%; display: inline-block;">
                                {!! $calendar->calendar() !!}
                            </div>
                    </div>
                </div>
            </div>
        <section class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <h2 class="font-weight-bold text-color-light text-6 mb-4">Latest Posts</h2>
                    </div>
                </div>
                <div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                    @foreach ($blog_etc_posts as $item)
                        
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <article>
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html" class="text-decoration-none">
                                    <img src="{{ URL::asset("blog_images/{$item->image_medium}") }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto pr-0">
                                    
                                </div>
                                <div class="col pl-1">
                                    <h4 class="line-height-3 text-4"><a href="blog-post.html" class="text-light"> {{$item->title }}</a></h4>
                                    <p class="text-color-light line-height-5 opacity-6 pr-4 mb-1">{{$item->subtitle }}</p>
                                <a href="" class="read-more text-color-light font-weight-semibold text-2">read more <i class="fas fa-chevron-right text-1 ml-1"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
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
</style>



<script type="text/javascript">
    $(document).ready(function() {
      
  $("#my_car").owlCarousel({
     
      autoPlay: 4000, //Set AutoPlay to 3 seconds
 
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1]
  });

  
  });
</script>


<style type="text/css">
#my_car .owl-item img{
  display: inline-block;  max-width: 100%;  height:350px;    
}
</style>

@endsection