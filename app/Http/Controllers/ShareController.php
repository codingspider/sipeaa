<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class ShareController extends Controller
{
    public function edit(Request $request, $id){

    	$data = DB::table('acounts_head')->where('acounts_head.id', $id)->first();

    	return view('pages.head_edit', compact('data'));
    }

    public function update(Request $request){

    	$id = $_POST['id'];

      $data = array();
      $data['name'] = $request->update;
        

        $users = DB::table('acounts_head')->where('acounts_head.id', $id)
        ->update($data);
      return redirect::back()->with('message', 'Data has been updated');
    }

    public function delete ($id){

    	$data= DB::table('acounts_head')->where('acounts_head.id', $id)->delete();

	return redirect::back()->with('message', 'Data has been deleted');

    }
}
