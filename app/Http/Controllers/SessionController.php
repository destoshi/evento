<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request){
        $session = new Session();

        $session->event_id = $request->input('event_id');
        $session->session_title = ucfirst(strtolower($request->input('session_title')));
        $session->session_content = ucfirst(strtolower($request->input('session_content')));

        $session->save();
        return redirect('events/'.$session->event_id);
    }

    public function update(Request $request){
        $session = Session::find($request->input('session_id'));

        $session->session_title = ucfirst(strtolower($request->input('session_title')));
        $session->session_content = ucfirst(strtolower($request->input('session_content')));

        $session->save();
        return redirect('events/'.$session->event_id);
    }

    public function destroy(Request $request){
        $session = Session::find($request->input('session_id'));
        $session->delete();

        return redirect('events/'.$request->input('event_id'));
    }
}
