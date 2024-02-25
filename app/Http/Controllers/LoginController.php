<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class LoginController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();

        return view('login', ['tickets' => $tickets]);
    }
}
