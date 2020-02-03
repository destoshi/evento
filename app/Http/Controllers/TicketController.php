<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use App\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PDF;

class TicketController extends Controller
{
    public function show(Ticket $ticket){
        return \view('ticket', ['ticket'=>$ticket]);

    }

    public function getTicket(Event $event){
        $user = Auth::user();

        $ticket = Ticket::where('user_id', $user->id )->where('event_id', $event->id)->first();


        if($ticket == null){
            $newTicket = new Ticket();
            $newTicket->user_id = $user->id;
            $newTicket->event_id = $event->id;
            $newTicket->save();
            return redirect()->back() ->with('alert', 'Ticket Created!');
        }else{
            return redirect()->back() ->with('alert', 'You Already Have A Ticket!');
        }

    }

}
