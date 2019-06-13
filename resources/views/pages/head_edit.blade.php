@extends('layouts.app2')
@section('title', 'SIPEAA Acounts')

@section('content')


<br>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<br>
<br>
<br>
<div class="container">
  <div class="col-md-8">
    <form action="{{ URL::to('/head/update') }}" method="POSt">
      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Acounts Head</label>
    <input type="text" name="update" class="form-control"  value="{{ $data->name}}">
    <input type="hidden" name="id" class="form-control"  value="{{ $data->id}}">
  </div>
<br>
<br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>
  
</div>
<br>
<br>
@endsection

