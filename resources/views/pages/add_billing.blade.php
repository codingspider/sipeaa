@extends('layouts.app2')
@section('title', 'Payment Process')
@section('content')
<br>
<br>
<div class="container">

        <?php
        $data = Cart::content();
        $cart = Cart::count();
        
        
        ?>
<div class="row">
        <div class="col-75">
          <div class="container">
            <form action="{{ URL::to('bkash/payment/success') }}" method="POST">
                @csrf
      
              <div class="row">
                <div class="col-50">

                  <h3>Billing Address</h3>
                  <div class="row">
                        <div class="col-50">
                          <label for="state">First Name</label>
                          <input type="text" id="state" name="first_name" placeholder="First Name">
                        </div>
                        <div class="col-50">
                          <label for="zip">Last Name</label>
                          <input type="text" id="zip" name="last_name" placeholder="Last Name">
                        </div>
                      </div>
                  <label for="fname"><i class="fa fa"></i> Company Name </label>
                  <input type="text" id="fname" name="company" placeholder="Copany Name">
                  <label for="fname"><i class="fa fa"></i> Select Country </label>

                  <select name="country_name" class="form-control" name="" id="">
                      <option value="">Select Your Country</option>
                      @foreach ($country as $value)
                          
                  <option value="{{ $value->name }}">{{ $value->name}}</option>
                  @endforeach

                  </select>
                  <br>
                  
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" name="city" placeholder="New York">
      
                  <div class="row">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input type="text" id="zip" name="postal" placeholder="10001">
                    </div>
                    
                  </div>
                  <label for="email"><i class="fa fa-"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="john@example.com">
                  <br>
                  <label for="email"><i class="fa fa-"></i> Phone </label>
                  <input type="text" id="email" name="phone" placeholder="john@example.com">
                </div>
                @foreach ($data as $item)
                    
            <input type="hidden" name="course" value="{{ $item->name }}">
            @endforeach

            <input type="hidden" name="total" value="{{ $newSubtotal }}">
      
                <div class="col-50">
                  <h3>Payment</h3>
                  <div class="icon-container">
                    <img src="https://www.putulhost.com/wp-content/uploads/2017/04/BKASH-LOGO.png" style="width:150px" alt="">
                  
                  </div>
                  <label for="cname">Bkash Transaction Number</label>
                  <input type="text" id="cname" name="transaction" placeholder="HFDO65DSF">
                  
               
                </div>
      
              </div>
            
              <input type="submit" value="Pay Now" class="btn">
            </form>
          </div>
        </div>
      
        <div class="col-25">
          <div class="container">
            <h4>Cart 
              <span class="price" style="color:black">
                <i class="fa fa-shopping-cart"></i> 
              <b>{{ Cart::count() }}</b>
              </span>
            </h4>
            @foreach ($data as $item)
                
        <p><a href="#">{{ $item->name }}</a> <span class="price">৳ {{ $item->price }}</span></p>

            @endforeach
        
            <hr>
        <p>Discount <span class="price" style="color:black"><b>৳ {{ session()->get('coupon')['discount'] }}</b></span></p>
            <hr>
        <p>Total <span class="price" style="color:black"><b>৳ {{ $newSubtotal }}</b></span></p>
          </div>
        </div>
      </div>
    </div>
<br>
      <style>
      
      .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}


input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
      </style>
@endsection