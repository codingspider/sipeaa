<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<br>
@if(session()->has('success'))
    <div style="color: #000" class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif


@if(session()->has('danger'))
    <div style="color:burlywood" class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<br>
@php

$users = DB::table('users')->where('approve', 1)
    ->get();


  
@endphp
<table class="table">
        <h2 class="text-center">Training Demand Details</h2>
        <thead class="thead-dark">
          <tr style="color:darksalmon">
            <th scope="col">ID</th>
            <th scope="col">Training Title</th>
            <th scope="col">Date</th>
            <th scope="col">Training Status </th>
            <th scope="col">Trainer Assigned </th>
            <th scope="col">Assign Trainer </th>
            <th scope="col">Change Status </th>
            <th scope="col">Vote </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            @foreach ($success as $item)
            <th>{{$item->id}}</th>
            <th>{{$item->traing_need}}</th>
            <th>{{$item->demand_date}}</th>
                    @if($item->training_status == 'approved')
                    <th style="color: #63f542;">{{$item->training_status}}</th>
                    @elseif($item->training_status == 'closed')
                    <th style="color: #f54b42;">{{$item->training_status}}</th>
                    @else 
                    <th style="color: #42f5d1;">{{$item->training_status}}</th>
                    @endif              
            <th>{{$item->tname}}</th>

            <th>
                  <form action="{{ URL::to('/assign/trainer') }}" method="POST">
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


            <th><form action="{{ URL::to('change/status/update/') }}" method="POST">
              @csrf
              <select style="color:black" onchange="this.form.submit()" name="status" id="status">
                  <option value="0">Select---</option>
                  <option value="pending">Pending</option>    
                  <option value="closed">Closed</option>    
                  <option value="approved">Approved</option>    
                  </select>
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  
              </form>
                </th>
                @php
                $vote = DB::table('training_demands')->where('id', $item->id)->first();
            @endphp
                <th style="color:blue">{{$vote->vote}}</th>
            <th>
                <button class="btn btn-danger" type="submit" onclick="window.location = '{{ URL::to('training/demand/delete/'.$item->id ) }}'">Delete</button>
            <th>
        </tr>
          
            @endforeach
         
        </tbody>
      </table>


@endsection