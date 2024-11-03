<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PostContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SuperController
{
    public function index(): view
    {
        $postContentInfo = PostContent::where('user_id', Auth::id())->get();

        return view('super.dashboard',
            [
                'allInfo' => $postContentInfo,
            ]
        );
    }

    public function showEventInfoById(Request $request): view
    {
        $fundId = $request->route('fund_id');
        $eventInfo = PostContent::where('fund_id', $fundId)->first();

        return view('super.event-info',
            [
                'eventInfo' => $eventInfo,
            ]
        );
    }

    public function showEventPaymentInfoById(Request $request): view
    {
        $fundId = $request->route('fund_id');
        $paymentInfo = Payment::where('fund_id', $fundId)->get();

        return view('super.payment-info',
            [
                'statusColorBG' => [
                    'pending' => 'fundy-warning-bg',
                    'confirmed' => 'fundy-success-bg',
                ],
                'paymentInfo' => $paymentInfo,
                'fundId' => $fundId,
            ]
        );
    }

    public function deleteEventInfoById()
    {
        $fundId = request()->route('fund_id');
        PostContent::where('fund_id', $fundId)->delete();

        return redirect()->route('super.dashboard');
    }

    public function showEventPaymentInfoByIdAndName(Request $request): view
    {
        $fundId = $request->input('fund_id');
        $payersName = $request->input('payers_name');
        $paymentInfo = Payment::where('fund_id', $fundId)
            ->when($payersName, function ($query, $payersName) {
                $query->where('payers_name', 'like', '%' . $payersName . '%');
            })
            ->get();

        return view('super.payment-info',
            [
                'statusColorBG' => [
                    'pending' => 'fundy-warning-bg',
                    'confirmed' => 'fundy-success-bg',
                ],
                'paymentInfo' => $paymentInfo,
                'fundId' => $fundId,
            ]
        );
    }
}
