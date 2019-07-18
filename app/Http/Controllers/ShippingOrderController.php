<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingOrderController extends Controller
{
    public function index(){
        $data = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.user_id')
        ->select('payments.*', 'users.name as uname')
        ->get();
        return view('pages.order_details_page', compact('data'));
    }
    public function change_status (Request $request){

        $data = DB::table('payments')
       ->where('id', $request->id)
       ->update([
        'payment_status'=> $request->payment_status,
       ]);

       if($data){
        return back()->with('success', 'Status updated Succesfuly');
       }else{
        return back()->with('warning', 'Someting went Wrong');  
       }
    }
    public function delete_order ($id){

        $data = DB::table('payments')
       ->where('id', $id)
       ->delete();

       if($data){
        return back()->with('success', 'Deleted Succesfuly');
       }else{
        return back()->with('warning', 'Someting went Wrong');  
       }
    }
}
