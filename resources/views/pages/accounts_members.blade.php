@extends('layouts.app2')
@section('title', 'SIPEAA Acounts')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
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
	      <select name="transaction_type" class="col-md-8" required>
		  <option selected>Select</option>
		  <option value="1">Income</option>
		  <option value="2">Expences</option>
		</select>
		<br>
		<br>
	</div>
		<p>Payment Type:</p>
	      <select name="payment_type" class="col-md-8" required>
		  <option selected>Select</option>
		  <option value="bank_transfer">Bank Transfer</option>
		  <option value="cheque">Cheque</option>
		  <option value="cash">Cash</option>
		  <option value="invoice">Invoice</option>
		  <option value="paypal">Paypal</option>
		</select>
		<br>
		<br>
		<p>Acounts Lists:</p>
	      <select name="head_name" class="col-md-8" required>
		  <option selected>Select</option>
		  @foreach($acounts as $value )
		  <option value="{{ $value->id }}">{{ $value->name }}</option>
		  @endforeach
		</select>
		<br>
		<br>
		<p>Transaction Date: </p>
		<input class="col-md-6" type="date" name="date" required=""><br>
		<br>
		<p>Transaction Amount: </p>
		<input class="col-md-6" type="text" name="amount" required="">
		<br>
		<br>
		<p>Transaction ID: </p>
		<p style="color:red;">* First make your transaction and then give your transaction id below.</p>
		<input class="col-md-6" type="text" name="transaction" required="">
		<br>
		<input type="hidden" name="user_id" value="{{ $id }}">
		<br>
		<input type="hidden" name="status" value="0">
		<br>
		<input type="submit" name="transaction" value="Add Payment" class="btn btn-primary"></input>
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
      <input type="text" name="name" class="form-control"  placeholder="name" required="">
      <br>
      <br>
       <input type="submit" name="delete" value="Add Head" class="btn btn-primary"></input>
    </div>
    
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
                   
              <th><a href="{{ URL::to('/edit/head',$data->id)}}" class="btn btn-primary">Edit</a></th>
            <th>
                <form action="{{ URL::to('/delete/head', $data->id)}}" method="GET">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="delete" value="Delete" class="btn btn-danger"></input>
                </form>
            </th>
      
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    <div id="menu2" class="tab-pane fade">
       <div class="container">
        <div class="row">
               <div class="container">
   <br>
   <div class="row">
    <div class="form-group col-md-6">
    <h5>Start Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-6">
    <h5>End Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
    </div>
    <div class="text-left" style="
    margin-left: 15px;
    ">
    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
    </div>
    </div>
    <br>
 <div>

  <table class="datatable table-condensed" id="laravel_datatable">
    <thead>
        <tr>
            <td><b>Transaction Id</b>

            </td>
            <td><b>Payment Head Name</b>

            </td>
            <td><b>Payment Amount</b>

            </td>
            <td><b>Created at</b>

            </td>
        </tr>
    </thead>
    <tbody>
      <tr>Transaction Id </tr>
      <tr>Payment Head Name </tr>
      <tr>Payment Amount </tr>
      <tr>Created at </tr>
    </tbody>
</table>


 </div>
   <br>
   <div align="center">
    <button class="btn pull-right btn-primary" type="submit">Print Item</button>
    <a href="#" class="btn btn-info" id="test">Export to Excel</a>
   </div>
 </div>  
        </div>
    </div>
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
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="name" required="">
    </div>
    
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="delete" value="Add Head" class="btn btn-primary"></input>
      </div>
  </form>
      </div>
      
    </div>
  </div>
</div>

<script>
 $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('/report/details') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [
                  { data: 'transactions_id', name: 'transactions_id' },
                  { data: 'payment_type', name: 'payment_type' },
                  { data: 'transactions_amount', name: 'transactions_amount' },
                  { data: 'created_at', name: 'created_at' }
               ]
      });
   });

  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
</script>

<script type="text/javascript">
  $(function () {
    $('button[type="submit"]').click(function () {
        var pageTitle = 'Transaction Report',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            win = window.open('', 'Print', 'width=900,height=600');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '</head><body>' + $('.datatable')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });
});

  $("#test").click(function(){
  $("#laravel_datatable").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "SomeFile", //do not include extension
    fileext: ".xls" // file extension
  }); 
});
</script>




<script src="{{ asset('js/jquery.table2excel.js') }}"></script>
@endsection

