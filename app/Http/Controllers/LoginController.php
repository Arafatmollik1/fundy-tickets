<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }

    public function processLoginWithEmail()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($data)) {
            return redirect()->route('events.index');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
