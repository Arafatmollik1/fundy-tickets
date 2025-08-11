<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PostContent;

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
        $donations = Payment::where('user_id', auth()->id())
            ->join('post_contents', 'payments.fund_id', '=', 'post_contents.fund_id')
            ->get();

        $donationStatusBG = [
            'pending' => 'bg-fundy-warning-bg',
            'confirmed' => 'bg-fundy-success-bg',
        ];

        return view('fundraising.my-donations',
            [
                'donations' => $donations,
                'donationStatusBG' => $donationStatusBG,
            ]
        );
    }

    public function listEvents()
    {
        $events = PostContent::all();

        return view('fundraising.list', [
            'events' => $events,
        ]);
    }
}
