@extends('layouts.app2')
@section('title', 'Shopping Cart')
@section('content')

<?php
$data = Cart::content();
$cart = Cart::count();


?>
<br>

<br>
 <p class="alert-success text-center">
        <?php
            
        $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        }
            
            ?>

<h3 class="text-center">Items in Cart</h3>

@if(session()->has('success_message'))
    <div class="alert alert-success text-center">
        {{ session()->get('success_message') }}
    </div>
@endif
@if(session()->has('error_message'))
    <div class="alert alert-danger text-center">
        {{ session()->get('error_message') }}
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th> Update</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                  @if($cart == 0)
                  <h2 class="text-center"> You have 0 Item in cart </h2>

                  @else
                  @foreach($data as $value)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> 
                              <img class="media-object" src="{{ URL::asset($value->options->images) }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{ $value->name }}</a></h4>
                            </div>
                        </div>
                      </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <form method="POST" action="{{ URL::to('/update/cart') }}">
                    @csrf
                      <input type="text" name="qty" class="input-sm" style="width: 30px; background-color: #72A4D2; text-align: center;" value="{{ $value->qty }}">
                      
                      <input type="hidden" name="rowId" value="{{ $value->rowId }}">
      
              <td><button class="btn btn-success" type="submit">Update</button></td>
      
          </form>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>৳{{ $value->price }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>৳ {{ $value->total }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                         <input type="button" class="btn btn-danger" value="Remove Item" onclick="window.location.href = '{{ URL::to('/delete/cart/prodotucs/'. $value->rowId) }}'"></td>
                    </tr>

                    @endforeach
                    @endif
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>৳ {{ Cart::subtotal() }}</strong></h5></td>
                    </tr>
                    <hr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        @if (session()->has('coupon'))
                        <td><h5>Discount ({{ session()->get('coupon')['name'] }}) </h5></td>
                        <td class="text-right text-center"><h5><strong>-৳ {{ session()->get('coupon')['discount'] }} %</strong></h5></td>
                    <form action="{{ route('coupon.destroy') }}" method="POST">
                        @csrf
                        {{ method_field('delete') }}
                            <td><button class="btn btn-danger" type="submit">Remove  </button></td>
                        </form>
                        @endif
                    </tr>
                 
                    <hr>
                    @if (session()->has('coupon'))
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5 >Subtotal After Discount</h5></td>
                        <td class="text-right"><h5><strong>৳{{ $newSubtotal }}</strong></h5></td>
                    </tr>
                    @endif
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>৳{{ $newSubtotal }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        @if (!session()->has('coupon'))
                    <form action="{{ route('coupon.store')}}" method="POST">
                        @csrf
                        <td> Coupon:  </td>
                        <td> <input type="text" name="coupon_code" id="coupon_code" style=" text-align: center; color: #000;" placeholder="Your Coupon"> </td>
                        <td>
                            <button type="submit" class="btn btn-info">Apply</button> 
                        </td>
                    </form>
                    @endif
                    <?php
					$data = Auth::id();
                    $data_shipping_id = Cart::count();
                    ?>
                    @if($data != NULL &&  $data_shipping_id != NULL )
                        <td>
                            
                            <input type="button" value=" Proceed to Checkout" onclick="window.location = '{{ URL::to('/add/billings/address')}}'" class="btn btn-success">                   
                        </td>
                        @elseif($data != NULL &&  $data_shipping_id == NULL)
                        <td>
                        <input type="button" value="Checkout" onclick="window.location = '{{ URL::to('/training/lists')}}'" class="btn btn-success">                   
                        </td>
                        @else
                        <td>
                        <input type="button" value="Checkout" onclick="window.location = '{{ URL::to('/login')}}'" class="btn btn-success">                   
                        </td>
                        
                        
                        @endif
                    
   
                    </tr>
                
                    <!-- Modal -->

                </tbody>
            </table>

        </div>
    </div>
</div>

<br>
<br>
<br>
@endsection