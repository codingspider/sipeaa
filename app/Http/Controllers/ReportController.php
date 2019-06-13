<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use Redirect,Response,DB,Config;
use Datatables;

class ReportController extends Controller
{
    public function reports_date_wise(){

    	$id = \Auth::id();
    	$usersQuery = Transaction::query();

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if($start_date && $end_date){
    
         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));
         
         $usersQuery->whereRaw("date(transactions.created_at) >= '" . $start_date . "' AND date(transactions.created_at) <= '" . $end_date . "'");
        }
        $users = $usersQuery->select('*')->where('transactions.user_id', $id )->orderBy('id', 'desc');
        return datatables()->of($users)
            ->make(true);
    }

}
