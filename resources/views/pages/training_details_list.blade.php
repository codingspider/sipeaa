@extends('crudbooster::admin_template')
@section('content')
<!--Table-->
@if(session()->has('success'))
<div class="alert alert-success text-center">
    {{ session()->get('success') }}
</div>
@endif
@php

$users = DB::table('users')->where('approve', 1)
    ->get();
@endphp
<table class="table table-striped w-auto">

        <!--Table head-->
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Form Date</th>
            <th>To Date</th>
            <th>Trainer</th>
            <th>Last Date</th>
            <th>Assign Trainer</th>
            <th>Action</th>
          </tr>
        </thead>
        <!--Table head-->
      
        <!--Table body-->
        <tbody>
            @foreach ($data as $item)
                
          <tr class="table-info">
          <th>{{$item->id}}</th>
          <th>{{$item->course_title}}</th>
          <th>{{$item->cname}}</th>
          <th>{{$item->form_date}}</th>
          <th>{{$item->to_date}}</th>
          <th>{{$item->uname}}</th>
          <th>{{$item->last_date}}</th>
          <th>
              <form action="{{ URL::to('/assign/trainer/success') }}" method="POST">
                  @csrf
                  <select style="color:black" onchange="this.form.submit()" name="assign_trainer">
                       <option value="0">Select---</option>
                         @foreach ($users as $value)
                          <option value="{{ $value->id}}">{{ $value->name}}</option>
                         @endforeach
                      </select>
                      <input type="hidden" name="id" value="{{ $item->id}}">
                </form>
        </th>


          <th><button class="btn btn-danger" type="submit" onclick="window.location.href = '{{ URL::to('training/course/delete/'.$item->id)}}'">Delete</button></th>
          <th><button class="btn btn-info" type="submit" onclick="window.location.href = '{{ URL::to('training/course/edit/'.$item->id)}}'">Edit</button></th>
          </tr>
        
          @endforeach
         
         
        </tbody>
        <!--Table body-->
      
      
      </table>
      <!--Table-->

@endsection