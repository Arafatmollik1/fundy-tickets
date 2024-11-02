<?php

namespace App\Http\Controllers;

use App\Models\PostContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FundEventController extends Controller
{
    public function index()
    {
        return view('super.fund-event');
    }

    public function store(Request $request)
    {
        // Validate and store the fund event
        $validated = $request->validate([
            'header' => 'required',
            'sub_header' => 'required',
            'event_date' => 'required',
            'event_price' => 'required',
            'place_of_event' => 'required',
            'img_src' => 'required',
        ]);

        $getImageSourceName = "pictures/".$request->file('img_src')->getClientOriginalName();
        // Store the fund event
        $postContent = new PostContent();
        $postContent->user_id = auth()->id();
        $postContent->fund_id = rand(1000, 9999);
        $postContent->header = $validated['header'];
        $postContent->subheader = $validated['sub_header'];
        $postContent->img_src = $getImageSourceName;
        $postContent->ticket_price = $validated['event_price'];
        $postContent->place_of_event = $validated['place_of_event'];
        $postContent->event_date = Carbon::create($validated['event_date'])->getTimestamp();
        $postContent->save();

        // Store the image is not working
        $request->file('img_src')->storeAs('public/pictures', $getImageSourceName);

        return redirect()->route('super.dashboard');

    }
}
