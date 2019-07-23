@extends('layouts.app2')
@section('title', 'Training Demand Details')
@section('content')
<br>
<br>

<body>

        @if(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
<div class="container">

    
<div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->
  <div class="product-content product-wrap clearfix product-deatil">
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12 ">
          
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
      
        <h2 class="name" >
          <p><strong>{{ $success->traing_need}}</strong></p>
          <br>
          <small > {{ $success->description}}</p>
        @php
            $vote = DB::table('training_demands')->where('id', $success->id)->first();
        @endphp
          <span class="fa fa-2x"><h5>Status: ({{ $vote->training_status }})</h5></span> <br><br>
          <span class="fa fa-2x"><h5>({{ $vote->vote }}) Votes</h5></span>  
         
        </h2>

 
        <div class="description description-tabs">
          <ul id="myTab" class="nav nav-pills">
            <li class="">
              <br>
            <form method="post" action="{{ URL::to('/vote/for/training') }}">
                @csrf

            <input type="hidden" name="voter_id" value="{{ Auth::id() }}">
            <input type="hidden" name="id" value="{{ $success->id}}">
               
            @if($vote->voter_id == Auth::id())
            <p class="btn btn-sm btn-warning pull-right">
                    You allready voted ! 
            </p>

            @else 
            <div class="margin-top-10">
            
                    <button type="submit" class="btn btn-sm btn-primary pull-right">
                     Vote for this Training
                    </button>
                   
                  </div>
            @endif
                
              </form>

            </li>
            
          </ul>
         
        </div>
        <hr>
        <div class="row">
          
         
        </div>
      </div>
    </div>
  </div>
  <!-- end product -->
</div>
</body>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection