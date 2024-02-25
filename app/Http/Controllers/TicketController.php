<?php

namespace App\Http\Controllers;

class TicketController extends Controller
{
    public function showByFundId($fund_id)
    {

        $tickets = 'e45j';

        return view('tickets.index', compact('tickets'));
    }
}
