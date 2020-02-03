<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profileImg(Request $request){
        $user = User::find($request->input('user_id'));
        $user->image = $request->file('profile_img')->store('public/profile_images');

        $user->save();

        return redirect('profile/'.$user->id);
    }

    public function show(User $user){
        return view('user_show',['user'=>$user]);
    }
}
