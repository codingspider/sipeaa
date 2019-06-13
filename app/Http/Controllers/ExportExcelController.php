<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Auth;

class ExportExcelController extends Controller
{
    function excel()
    {
     $customer_data = DB::table('transactions')->where('transactions.user_id', Auth::id())->orderBy('id', 'desc')->get()->toArray();
     $customer_array[] = array('transactions_id', 'transactions_date', 'transactions_amount');

     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'transactions_id'  => $customer->transactions_id,
       'transactions_date'   => $customer->transactions_date,
       'transactions_amount'    => $customer->transactions_amount
  
      );
     }
     Excel::create('Data', function($excel) use ($customer_array){
      $excel->setTitle('Data');
      $excel->sheet('Data', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }
}
