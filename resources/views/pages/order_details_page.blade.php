@extends('crudbooster::admin_template')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success text-center">
    {{ session()->get('success') }}
</div>
@endif
@if(session()->has('warning'))
<div class="alert alert-danger text-center">
    {{ session()->get('warning') }}
</div>
@endif
<div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Transaction ID</th>
              <th scope="col">Payment By</th>
              <th scope="col">Course Title</th>
              <th scope="col">Course Fee</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Action</th>
              <th></th>


            </tr>
          </thead>
          <tbody>
              @foreach ($data as $item)
                  
            <tr>
            <th scope="row">{{$item->id }}</th>
            <th scope="row">{{$item->payment_method }}</th>
            <th style="background:goldenrod;" scope="row">{{$item->transaction_id }}</th>
            <th scope="row">{{$item->uname }}</th>
            <th scope="row">{{$item->course }}</th>
            <th scope="row">{{$item->course_fee }}</th>
            @if($item->payment_status == 'actived')
            <th style="color:chartreuse;" scope="row">{{$item->payment_status }}</th>
            @elseif($item->payment_status == 'cancelled')
            <th style="color:crimson;" scope="row">{{$item->payment_status }}</th>
            @else 
            <th style="color:darkblue;" scope="row">{{$item->payment_status }}</th>
            @endif
            <th scope="row">
            <form action="{{ URL::to('change/course/order/status')}}" method="POST">
                @csrf
                    <select  onchange="this.form.submit()" name="payment_status">
                        <option value="pending">Select----</option>
                        <option value="pending">Pending</option>
                        <option value="actived">Active</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <input type="hidden" name="id" value="{{$item->id }}">
                </form>
            </th>
          <th> <button class="btn btn-danger" onclick="window.location.href = '{{URL::to('/delete/course/order/'.$item->id)}}'"  >Delete</button> </th>
       
            </tr>
            @endforeach
        
          </tbody>
        </table>
      </div>
@endsection