<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')

<p class="alert-success">
        <?php
            
        $message = Session::get('successfull', null);
        if($message){
            echo $message;
            Session::put('successfull', null);
        }
            
            ?>
<table class="table">
  <thead>
    <tr>
      <tr>
                <th>Transaction Id </th>
                <th>Transaction Date</th>
                <th>Transaction Amount </th>
                <th>User Name </th>
                <th>User Email</th>
                <th>Action</th>
                
        </tr>
    </tr>
  </thead>
  <tbody>
    <tr>

      <th scope="row"><input type="disable" value="{{ $data->transactions_id }}"></th>
      <td>{{ $data->transactions_date }}</td>
      <td>{{ $data->transactions_amount }}</td>
      <td>{{ $data->uname }}</td>
      <td>{{ $data->umail }}</td>

        @if($data->transactions_status == 1)
                <td><a class="btn btn-success" href="{{ URL::to('/cancel', $data->id)}}"> <i class="fa fa-thumbs-up"></i></td>
         @else
                <td><a class="btn btn-danger" href="{{ URL::to('/success', $data->id)}}"> <i class="fa fa-thumbs-down"></i></td>
         @endif
    </tr>
    
  </tbody>
</table>
@endsection