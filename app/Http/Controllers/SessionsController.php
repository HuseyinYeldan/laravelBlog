<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        //For security invalidating the session can help session hijacks from hackers.
        Session::invalidate();
        return redirect('/')->with('success', 'You are logged out.');
    }
    public function create()
    {
        return view('sessions.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Seems like the credentials are incorrect.']);
        }
        //Session fixation fix
        Session::regenerate();
        return redirect('/')->with('success', 'You are logged in!');
    }
}
