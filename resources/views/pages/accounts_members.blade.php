@extends('layouts.app2')
@section('title', 'SIPEAA Acounts')

@section('content')

@if(session()->has('successfull'))
    <div class="alert alert-success">
        {{ session()->get('successfull') }}
    </div>
@endif

 @php
  $acounts = DB::table('acounts_head')->get();
  $id = Auth::id();

  @endphp


<div class="container">
  <h2>Accounts SIPEAA</h2>
  <div class="form-group pull-right"><button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#exampleModal">
    	
 Acounts Head Creation
</button></div>
  <br>
  <ul class="nav nav-tabs">
    <li class="active"><a class="nav-link" style="color:blue;" data-toggle="tab" href="#home">Acounts Records Entry</a></li>
    <li><a class="nav-link" data-toggle="tab" style="color:blue;" href="#menu1">Acounts Head Creation</a></li>
    <li><a class="nav-link" data-toggle="tab" style="color:blue;" href="#menu2">Acounts Report</a></li>
   
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane active">
    <form action="{{URL::to('/make/transaction')}}" method="POST">
    	@csrf
      	<div>
      		<p>Transaction Type:</p>
	      <select name="transaction_type" class="col-md-8">
		  <option selected>Select</option>
		  <option value="1">Income</option>
		  <option value="2">Expences</option>
		</select>
		<br>
		<br>
	</div>
		<p>Payment Type:</p>
	      <select name="payment_type" class="col-md-8">
		  <option selected>Select</option>
		  <option value="1">Bank Transfer</option>
		  <option value="2">Cheque</option>
		  <option value="2">Cash</option>
		  <option value="2">Invoice</option>
		  <option value="2">Paypal</option>
		</select>
		<br>
		<br>
		<p>Acounts Lists:</p>
	      <select name="head_name" class="col-md-8">
		  <option selected>Select</option>
		  @foreach($acounts as $value )
		  <option value="{{ $value->id }}">{{ $value->name }}</option>
		  @endforeach
		</select>
		<br>
		<br>
		<p>Transaction Date: </p>
		<input class="col-md-6" type="date" name="date"><br>
		<br>
		<p>Transaction Amount: </p>
		<input class="col-md-6" type="text" name="amount">
		<br>
		<br>
		<p>Transaction ID: </p>
		<p style="color:red;">* First make your transaction and then give your transaction id below.</p>
		<input class="col-md-6" type="text" name="transaction">
		<br>
		<input type="hidden" name="user_id" value="{{ $id }}">
		<br>
		<input type="hidden" name="status" value="0">
		<br>
		<button type="submit" class="btn btn-info center-block">Add Transaction</button>
		<div>
			
		</div>
		</form>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Acounts Head Creation</h3>
      <form action="{{URL::to('/acounts/head') }}" method="POST">
  	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Acount Head Name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="name">
    </div>
    
  </div>
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
  <br>
  <br>
 
  <table class="table table-info">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">Acounts Head Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach( $acounts as $data)
    <tr>
      <th scope="row">{{ $data->id }}</th>
      <th scope="row">{{ $data->name }}</th>
      <th><a class="btn btn-success" href="{{ URL::to('/unactive_product', $item->id)}}"> <i class="fa fa-pen"></i></th>
                   
      <th><a class="btn btn-danger" href="{{ URL::to('/active_product', $item->id)}}"> <i class="fa fa-trash-alt"></i></th>
      
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
<br>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Acounts Heaed Creation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="{{URL::to('/acounts/head') }}" method="POST">
  	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Acount Head Name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="name">
    </div>
    
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
      </div>
      
    </div>
  </div>
</div>

@endsection

