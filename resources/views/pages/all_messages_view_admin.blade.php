<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<br>
@if(session()->has('success'))
    <div style="color: #000" class="alert alert-info">
        {{ session()->get('success') }}
    </div>
@endif


@if(session()->has('danger'))
    <div style="color:burlywood" class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
dfgg
@endsection