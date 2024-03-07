<?php

namespace App\Http\Controllers;

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
}
