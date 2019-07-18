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
@php
    $approve = DB::table('training_demands')->where('training_status', 'approved')->count();
    $close = DB::table('training_demands')->where('training_status', 'closed')->count();
    $pending = DB::table('training_demands')->where('training_status', 'pending')->count();
@endphp

<br>

Total Approve Training: <button class="btn btn-success">{{$approve}}</button> Total Close Training: <button class="btn btn-danger">{{$close}}</button> Total Pending Training: <button class="btn btn-info">{{$pending}}</button>
<br>
<br>
<section id="tabs">
        <div class="container">
         <div class="col-md-11">
            <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th class="col-md-1" scope="col">ID</th>
                        <th class="col-md-2" scope="col">Demanded by</th>
                        <th class="col-md-2" scope="col">Training Need</th>
                        <th class="col-md-4" scope="col">Demand Description</th>
                        <th class="col-md-2" scope="col">Demand Date</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                            <tr>
                            <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->tname }}</td>
                                <td>{{ $item->traing_need }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->demand_date }}</td>
                       
                    </tr>
                            @endforeach
                    </tbody>
                    </table>
            
                </div>
        </div>
    </section>


    <style>
section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 10px;
    text-transform: uppercase;
}
#tabs{
	background: blue;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
    margin: 20px;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: greenyellow;
    font-size: 20px;
    margin: 20px;

}
    </style>
@endsection