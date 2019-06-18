<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Auth;
use Session;
session_start();

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function add_payment(Request $request){

      

        $user_id = Auth::id();
        $total = Cart::total();
        $shipID = DB::table('shipings')->where('user_id', $user_id)->first();

        foreach($shipID as $value){

        }

        $data = array();
        $data['payment_method'] = 'Bkash';
        $data['payment_status'] = 'active';
        $data['transaction_id'] = $request->transaction;
        $payment_id = DB::table('payments')
        ->insertGetId($data); 


        $odata = array();
        $odata['customer_id'] = $user_id; 
        $odata['shiping_id'] = 1;
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 'pending';
        $odata['product_id'] =$v_contents->id;

        $order_id = DB::table('orders')
        ->insertGetId([$odata]); 

        $contents = Cart::content();

        $oddata = array();
        foreach($contents as $v_contents){

            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_contents->id;
            $oddata['product_name'] = $v_contents->name;
            $oddata['product_price'] = $v_contents->price;
            $oddata['product_quantity'] = $v_contents->qty;

            DB::table('order_details')
            ->insert($oddata);
            Cart::destroy();
        }
  
        Session::flash('success', 'Payment successful!');
          
        return view('pages.thankyou');
    }
}
