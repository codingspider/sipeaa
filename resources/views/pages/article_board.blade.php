@extends('layouts.app2')
@section('title', 'Article Board')
@section('content')

@php
    $users = DB::table('users')->where('user_type', 'member')->where('admin', 1)->get(); 
@endphp
<br>
<div class="container">
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
                  @foreach ($users as $item)
                      
                  <!-- Team Member 1 -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow text-center">
                    <img  src="{{ URL::asset('images/'.$item->images)}}" class="mx-auto d-block" style="width:100px; height:100%;" alt="...">
                      <div class="card-body text-center">
                        <h5 class="card-title mb-0"></h5>
                        <div class="card-text text-black-100"> Name: {{$item->name}}</div>
                        <p>Email: {{$item->email}}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
              
              
                </div>
                <!-- /.row -->
              
              </div>
              <!-- /.container -->
              </body>
    </div>
<br>

<style>
.view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
</style>

    
@endsection