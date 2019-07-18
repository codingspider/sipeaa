@extends('layouts.app2')
@section('title', 'Course Posting Board List')
@section('content')
<br>
<br>




<body>
  <!-- Header -->
<header class="text-center py-2 mb-4">
  <div class="container">
    <h1 class="font-weight-light text-black">Meet the Team</h1>
  </div>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    @foreach ($data as $item)
        
    <!-- Team Member 1 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow text-center">
      <img  src="{{ URL::asset($item->photo)}}" class="mx-auto d-block" style="width:100px; height:100%;" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0"></h5>
          <div class="card-text text-black-100">{{$item->name}}</div>
        </div>
      </div>
    </div>
    @endforeach


  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
</body>

<br>
<br>
@endsection