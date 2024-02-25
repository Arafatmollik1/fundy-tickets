<?php

namespace App\Http\Controllers;

class TicketController extends Controller
{
    public function showByFundId($fund_id)
    {
        return view('tickets.index', ['fund_id' => $fund_id]);
    }
}
