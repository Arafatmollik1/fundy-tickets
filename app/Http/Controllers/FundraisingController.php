<?php

namespace App\Http\Controllers;

use App\Models\PaymentsSimplified;
use App\Models\PostContent;
use App\Models\PostContentSimplified;
use App\Models\TicketsSimplified;

class FundraisingController extends Controller
{
    public function showByFundId($fund_id)
    {
        $post_content = PostContent::where('fund_id', session('fund_id'))->first();

        return view('fundraising.index',
            [
                'post_content' => $post_content,
            ]
        );
    }

    public function showMyDonations()
    {
        $ticketInfo = TicketsSimplified::where('fund_id', session('fund_id'))->get();
        $ticketStatusBG = [
            'pending' => 'bg-fundy-warning-bg',
            'confirmed' => 'bg-fundy-success-bg',
        ];
        $eventName = PostContentSimplified::where('fund_id', session('fund_id'))->first();

        return view('fundraising.my-donations',
            [
                'ticketInfo' => $ticketInfo,
                'ticketStatusBG' => $ticketStatusBG,
                'eventName' => $eventName->header,
            ]
        );
    }
}
