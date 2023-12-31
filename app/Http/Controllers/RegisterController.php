<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('regsiter.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:32|min:4|unique:users',
            'name' => 'required|max:64|min:3',
            'email' => 'required|email|max:128|min:8|unique:users',
            'password' => 'required|max:128|min:8',
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created!');
    }
}
