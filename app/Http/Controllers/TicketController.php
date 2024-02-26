<?php

namespace App\Http\Controllers;

use App\Models\PostContentSimplified;

class TicketController extends Controller
{
    public function showByFundId($fund_id)
    {
        //get post content from post PostContentSimplified model
        $post_content = PostContentSimplified::where('fund_id', session('fund_id'))->first();

        return view('tickets.index', ['post_content' => $post_content]);
    }
}
