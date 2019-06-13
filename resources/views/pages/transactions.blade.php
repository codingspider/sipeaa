<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<table id="table_id" class="display">

    <?php
    $users = DB::table('users')->get();

    ?>


    <p class="alert-success">
        <?php
            
        $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        }
            
            ?>
        <thead>
            <tr>
                <th>Transaction Id </th>
                <th>Transaction Date</th>
                <th>Transaction Amount </th>
                <th>Transaction Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                

                @foreach ($data as $item)

                <td># {{$item->id}}</td>
                <td>{{$item->transactions_date}}</td> 
                <td>{{$item->transactions_amount}}</td> 


                @if($item->transactions_status == 1)
                <td style="color:blue;">Paid</td>
                    @else
                <td style="color:red;">Cancelled</td>
                        @endif
                <td><a class="btn btn-info" href="{{ URL::to('/transactions/details', $item->id)}}"> <i class="fa fa-eye"></i></td>

            <td>
            <form action="{{ URL::to('/user/delete', $item->id)}}" method="post">
                  @csrf
                  
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>

                    
            </tr>
                    
                @endforeach
                
          
           
        </tbody>
    </table>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script>

$(document).ready( function () {
    $('#table_id').DataTable();
} );

 </script>
@endsection