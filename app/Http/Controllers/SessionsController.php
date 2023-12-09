<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();
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
                ->withErrors(['email' => 'Seems like the credentials are incorrect.']);
        }
        //Session fixation fix
        session()->regenerate();
        return redirect('/')->with('success', 'You are logged in!');
    }
}
