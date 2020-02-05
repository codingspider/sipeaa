@extends('layouts.app2')
@section('title', 'Article Board')
@section('content')
<br>
<div class="container">
        <body>             
              <!-- Page Content -->
              <div class="container">
                <div class="row">
                  <!-- Team Member 1 -->
                  <div class="col-md-6">
                    <div class="card border-0 shadow text-center">
                    <img  src="{{ URL::asset($president->images)}}" class="mx-auto d-block" style="width:200px; height:100%;" alt="...">
                      <div class="card-body text-center">
                        <h5 class="card-title mb-0"></h5>
                        <p> Name: {{$president->name}}</p>
                        <p>Sipeaa ID: {{$president->sipeaa_id}}</p>
                        <p>Registration No: {{$president->reg_no}}</p>
                      </div>
                    </div>
                  </div>
                        <div class="col-md-6">
                    <div class="card border-0 shadow text-center">
                    <img  src="{{ URL::asset($Vice_President->images)}}" class="mx-auto d-block" style="width:200px; height:100%;" alt="...">
                      <div class="card-body text-center">
                        <h5 class="card-title mb-0"></h5>
                       <p> Name: {{$president->name}}</p>
                        <p>Sipeaa ID: {{$president->sipeaa_id}}</p>
                        <p>Registration No: {{$president->reg_no}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
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