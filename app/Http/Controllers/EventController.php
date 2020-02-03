<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('events')->orderByDesc('id')->paginate(10);
        return view('event_index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("event_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->user_id = Auth::user()->id;
        $event->event_title = ucfirst(strtolower($request->input('event_title')));
        $event->image = $request->file('event_img')->store('public/profile_images');;
        $event->brief = ucfirst(strtolower($request->input('brief')));
        $event->event_content = ucfirst(strtolower($request->input('event_content')));
        $event->date = date("Y-m-d", strtotime($request->input('date')));
        $event->country = ucfirst(strtolower($request->input('country')));
        $event->city = ucfirst(strtolower($request->input('city')));
        $event->speaker = ucfirst(strtolower($request->input('speaker')));

        $event->save();


        return redirect('events/'.$event->id);
        //$newDate = date("Y-m-d", strtotime($request->input('date')));
        //return view('temp', ['date' => $newDate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $userid = $event->user_id;

        $events = Event::all()->sortByDesc('id')->take(3);
        return view('event_show',['event'=>$event,  'events'=>$events]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->authorize('view', $event);
        return view("event_edit",['event'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->event_title = ucfirst(strtolower($request->input('event_title')));
        if($request->file('event_img') != null){
            $event->image = $request->file('event_img')->store('public/event_images');
        }
        $event->brief = ucfirst(strtolower($request->input('brief')));
        $event->event_content = ucfirst(strtolower($request->input('event_content')));
        $event->date = date("Y-m-d", strtotime($request->input('date')));
        $event->country = ucfirst(strtolower($request->input('country')));
        $event->city = ucfirst(strtolower($request->input('city')));
        $event->speaker = ucfirst(strtolower($request->input('speaker')));

        $event->save();

        return redirect('events/'.$event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
        $eventdelete = \App\Event::find($event->id);
        $eventdelete->delete();

        $events = DB::table('events')->paginate(10);
        return redirect('/events');

    }
}
