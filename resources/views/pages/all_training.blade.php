@extends('layouts.app2')
@section('title', 'All Training')
@section('content')

<br>
<br>
<h4 class="text-center">All Training Course</h4>
<div class="container">
    
<div class="row">
           @foreach( $data as $value)
    <figure class="snip1423">
  <img src="{{ URL::asset("documents/{$value->images}") }}" alt="sample57" />
  <figcaption>
    <h3>{{ $value->course_title }}</h3>
    <p>{{ $value->description}}</p>
    <div class="price">
      <s></s>৳ {{ $value->reg_fee }}
    </div>
  </figcaption><i class="ion-android-cart"></i>
  <a href="{{ URL::to('/training/course/details', $value->id ) }}"></a>
</figure>
     @endforeach
</div>

</div>
<br>
<br>
<br>
<style type="text/css">
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Oswald:300,400);
.snip1423 {
  font-family: 'Oswald', Arial, sans-serif;
  position: relative;
  float: left;
  margin: 20px 1%;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  background: #ffffff;
  text-align: center;
  color: #000000;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  font-size: 16px;
  padding: 15px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}
.snip1423 * {
  -webkit-box-sizing: padding-box;
  box-sizing: padding-box;
  -webkit-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}
.snip1423 img {
  max-width: 100%;
  vertical-align: top;
  position: relative;
}
.snip1423 figcaption {
  padding: 20px 15px;
}
.snip1423 h3,
.snip1423 p {
  margin: 0;
}
.snip1423 h3 {
  font-size: 1.3em;
  font-weight: 400;
  margin-bottom: 5px;
  text-transform: uppercase;
}
.snip1423 p {
  font-size: 0.9em;
  letter-spacing: 1px;
  font-weight: 300;
}
.snip1423 .price {
  font-weight: 500;
  font-size: 1.4em;
  line-height: 48px;
  letter-spacing: 1px;
}
.snip1423 .price s {
  margin-right: 5px;
  opacity: 0.5;
  font-size: 0.9em;
}
.snip1423 i {
  position: absolute;
  bottom: 0;
  left: 50%;
  -webkit-transform: translate(-50%, 50%);
  transform: translate(-50%, 50%);
  width: 56px;
  line-height: 56px;
  text-align: center;
  border-radius: 50%;
  background-color: #666666;
  color: #ffffff;
  font-size: 1.6em;
  border: 4px solid #ffffff;
}
.snip1423 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}
.snip1423:hover,
.snip1423.hover {
  -webkit-transform: translateY(-5px);
  transform: translateY(-5px);
}
.snip1423:hover i,
.snip1423.hover i {
  background-color: #2980b9;
}
/* Demo purposes only */
body {
  background-color: #212121;
}

</style>
@endsection