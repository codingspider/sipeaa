<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AccountsController extends Controller
{

	

    public function index(){

    	return view ('pages.accounts_members');
    }

    public function head(Request $request){
    	$request->validate([
        'name'=>'required',
        
      ]);
    	$data = array();
        $data['name'] = $request->name;
        
        $users = DB::table('acounts_head')
        ->insert($data);

    	return redirect::back()->with('message', 'You have successfully created acounts head');
    }

    public function make_transaction(Request $request){
    	
    	$data = array();
        $data['transactions_type'] = $request->transaction_type;
        $data['payment_type'] = $request->payment_type;
        $data['transactions_head'] = $request->head_name;
        $data['transactions_date'] = $request->date;
        $data['transactions_amount'] = $request->amount;
        $data['transactions_id'] = $request->transaction;
        $data['transactions_status'] = $request->status;
        $data['user_id'] = $request->user_id;
        
        $users = DB::table('transactions')
        ->insert($data);

    	return redirect::back()->with('message', 'Your payment has been successfull');
    }

    public function transactions_control(){

    	$data = DB::table('transactions')->orderBy('id', 'desc')->get();

    	return view('pages.transactions', compact('data'));
    }


    public function transactions_details ($id) {

    	$data = DB::table('transactions')
    	    ->join('users', 'users.id', '=', 'transactions.user_id')
            ->select('transactions.*', 'users.name as uname') 
    		->where('transactions.id', $id)->first();

    	return view('pages.transactions_details', compact('data'));
    }

    public function transactions_success ($id) {

    	$val = 1;
        DB::table('transactions')
        ->where('id', $id)
        ->update(['transactions_status'=> $val]); 
        Session::put('successfull','Payment sucessfully');
        return redirect::back();
    }

    public function transactions_cancel ($id) {

    	$val = 0;
        DB::table('transactions')
        ->where('id', $id)
        ->update(['transactions_status'=> $val]); 
        Session::put('successfull','Cancel sucessfully');
        return redirect::back();
    }

    public function transactions_delete ($id) {

    	
        DB::table('transactions')
        ->where('id', $id)
        ->delete(); 
        Session::put('successfull','Transaction Deleted sucessfully');
        return redirect::back();
    }
}

