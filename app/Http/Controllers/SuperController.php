<?php

namespace App\Http\Controllers;

use App\Models\SuperUsers;

class SuperController
{
    public function index()
    {
        $eventInfo = SuperUsers::getEventInfo();

        return view('super.dashboard',
            [
                'eventInfo' => $eventInfo,
            ]
        );
    }
}
