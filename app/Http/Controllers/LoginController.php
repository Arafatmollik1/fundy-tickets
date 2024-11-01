<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }
}
