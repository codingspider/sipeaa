@extends('layouts.app2')
@section('title', 'All Jobs')
@section('content')

@php
    $data = DB::table('job_location')->orderBy('id', 'DESC')->get();

    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();

@endphp
<br>
<br>

<br>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">
                 <p class="text-center"> Select Blood Group </p>
    <form method="post" action="{{URL::to('/search/result') }}">
        @csrf
    <select  style=" border: 1px solid black;" id="search" name="blood_group" onchange="this.form.submit()" class="form-control">

            <option selected>Select</option>
            <option value="A">A+</option>
            <option value="A">A-</option>
            <option value="B">B+</option>
            <option value="B">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB">AB-</option>
            <option value="O">O</option>
            <option value="O-">O-</option>
                </select>
</form>
<br>
<br>
<p class="text-center"> Select Job Areas </p>
    <form method="post" action="{{URL::to('/search/result/job/areas') }}">
        @csrf
    <select style=" border: 1px solid black;" id="search" name="job_areas" onchange="this.form.submit()" class="form-control">

                  <option selected>Select</option>
                  @foreach( $job_areas as $jobs )
                  <option value="{{ $jobs->id }}">{{ $jobs->category_name }}</option>
                  @endforeach
                </select>
</form>
             </div>
            
             </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

@endsection