<?php

namespace App\Http\Controllers;

use App\Models\PaymentsSimplified;
use App\Models\PostContentSimplified;
use App\Models\SuperUsers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuperController
{
    public function index(): view
    {
        $eventInfo = SuperUsers::getEventInfo();

        return view('super.dashboard',
            [
                'eventInfo' => $eventInfo,
            ]
        );
    }

    public function showEventInfoById(Request $request): view
    {
        $fundId = $request->route('fund_id');
        $eventInfo = PostContentSimplified::where('fund_id', $fundId)->first();

        return view('super.event-info',
            [
                'eventInfo' => $eventInfo,
            ]
        );
    }

    public function showEventPaymentInfoById(Request $request): view
    {
        $fundId = $request->route('fund_id');
        $paymentInfo = PaymentsSimplified::where('fund_id', $fundId)->get();

        return view('super.payment-info',
            [
                'statusColorBG' => [
                    'pending' => 'fundy-warning-bg',
                    'confirmed' => 'fundy-success-bg',
                ],
                'paymentInfo' => $paymentInfo,
            ]
        );
    }
}
