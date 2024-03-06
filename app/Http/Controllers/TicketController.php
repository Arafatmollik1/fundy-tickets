<?php

namespace App\Http\Controllers;

use App\Models\PaymentsSimplified;
use App\Models\PostContentSimplified;
use App\Models\TicketsSimplified;

class TicketController extends Controller
{
    public function showByFundId($fund_id)
    {
        //get post content from post PostContentSimplified model
        $post_content = PostContentSimplified::where('fund_id', session('fund_id'))->first();

        $paymentStatus = PaymentsSimplified::where('fund_id', session('fund_id'))->get('status');

        return view('tickets.index',
            [
                'post_content' => $post_content,
                'paymentStatus' => $paymentStatus,
            ]
        );
    }

    public function showMyTickets()
    {
        $ticketInfo = TicketsSimplified::where('fund_id', session('fund_id'))->get();
        $ticketStatusBG = [
            'pending' => 'bg-fundy-warning-bg',
            'confirmed' => 'bg-fundy-success-bg',
        ];
        $eventName = PostContentSimplified::where('fund_id', session('fund_id'))->first();

        return view('tickets.my-tickets',
            [
                'ticketInfo' => $ticketInfo,
                'ticketStatusBG' => $ticketStatusBG,
                'eventName' => $eventName->header,
            ]
        );
    }
}
