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
                    'id'=> $value->id,
                    'url' => '/events/details',
                ]
            );
        }
    }
    $calendar = Calendar::addEvents($events);



      return view('pages.intro2', compact('calendar'));

    }

    public function events_details($id){

        $data = DB::table('events')->where('id', $id)->get();


        return view('pages.event_details', compact('data'));
    }
}
