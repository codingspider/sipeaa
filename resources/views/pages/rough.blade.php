<div id='calendar' style="width: 70%; display: inline-block;">
    {!! $calendar->calendar() !!}
</div>


<div class="slider">
    <div id="owl-demo">
       @foreach($events as $value)
         <div class="item"><img src="{{$value->images}}" alt="Owl Image">
         </div>
       @endforeach
     </div>
</div>


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

{!! $calendar->script() !!}