<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Session;
use Khsing\World\World;

session_start();
class CartController extends Controller
{
    public function add_to_cart(Request $request){

       $id =  $request->product_id;
       $qty =  $request->quantity;

        $productinfo = DB::table('trainings')
                    ->where('id', $id)
                    ->first();

        $data['qty'] = $qty;
        $data['id'] = $productinfo->id;
        $data['name'] = $productinfo->course_title;
        $data['price'] = $productinfo->reg_fee;
        $data['options']['images'] = $productinfo->images;


        Cart::add($data);


        return redirect::to('/show/cart');
    }
    public function showcart(){



        $discount = session()->get('coupon')['discount'];
        $Subtotal = Cart::total();

        $discounted_price = $Subtotal - ($Subtotal * $discount / 100);

        Session::put('shiping_id', $shiping_id);


        return view('pages.shoping_cart')->with([

            'discount' => $discount,
            'newSubtotal' => $discounted_price,

        ]);
    }

    public function update_to_cart(Request $request){

        $id =  $request->rowId;
        $qty =  $request->qty;

        Cart::update($id, $qty);
 
        return redirect::to('/show/cart')->with('message', 'Cart has been Updated');

    }

    public function delete_to_cart($rowId){

        Cart::update($rowId, 0);

        return redirect::to('/show/cart')->with('message', 'Cart has been Deleted');

    }

    public function save_shipping(Request $request){

        $rules = array (
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required',
    );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ())
            return Response::json ( array (
                        
                    'errors' => $validator->getMessageBag ()->toArray ()
            ) );
            else {
            $data = array();
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['company'] = $request->company;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['postal'] = $request->postal;
            $data['country_name'] = $request->country_name;
            $data['user_id'] = Auth::id();

            $shiping_id = DB::table('shipings') 
            ->insertGetId($data);    


            $data = array();
            $data['payment_method'] =  $request->method;
            $data['payment_status'] = $request->status;
            $data['transaction_id'] = $request->transaction;
            $data['user_id'] = Auth::id();
            $data['course_fee'] = $request->total;
            $data['course'] = $request->course;
            $payment_id = DB::table('payments')
            ->insertGetId($data); 
    
            
            Session::put('shiping_id', $shiping_id);
            

            
            Mail::send( new SendMailable ($request));

            Cart::destroy();

            return view('pages.thanks');
        }
    }

    public function payment(){


        return view('pages.payment_method');
    }

    public function add_billing(){

        $country = World::Countries('name', 'DESC');

        $discount = session()->get('coupon')['discount'];
        $Subtotal = Cart::total();

        $discounted_price = $Subtotal - ($Subtotal * $discount / 100);


        return view('pages.add_billing')->with([

            'discount' => $discount,
            'newSubtotal' => $discounted_price,
            'country' => $country,
        ]);
    }
}
