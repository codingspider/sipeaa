<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Calendar;

use App\Event;
use DB;

class EventController extends Controller

{
  

    public function index() {

       $events = [];

       $data = DB::table('events')->get();



       if($data->count()) {
        foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->title,
                true,
                new \DateTime($value->start_date),
                new \DateTime($value->end_date.' +1 day'),
                null,
                // Add color and link on event
                [
                    'color' => '#f05050',
                    //'url' => '/events/details', $value->id,
                ]
            );
        }
    }
    $calendar = Calendar::addEvents($events);


      return view('master', compact('calendar'));

    }
}
