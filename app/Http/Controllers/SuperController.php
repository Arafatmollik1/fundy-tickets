<?php

namespace App\Http\Controllers;

use App\Models\SuperUsers;
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

    public function showEventInfoById(): view
    {
        return view('super.event-info');
    }
}
