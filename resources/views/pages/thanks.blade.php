@extends('layouts.app2')
@section('title', 'Payment Process')
@section('content')
<br>
<div class="container">
        <div class="jumbotron text-xs-center">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
                <hr>
                <p>
                  Having trouble? <a href="">Contact us</a>
                </p>
                <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ URL::to('/home')}}" role="button">Continue to homepage</a>
                </p>
              </div>


</div>
@endsection