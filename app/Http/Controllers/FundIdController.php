<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundIdController extends Controller
{
    public function setFundId(Request $request)
    {
        // Validate and set the fund_id from query parameter to the session
        $fundId = $request->query('id');

        if ($fundId) {
            $request->session()->put('fund_id', $fundId);

            return redirect()->route('tickets.showByFundId', ['fund_id' => $fundId]);
        }

        // If no id was provided, redirect to the 'get-fund-id' page
        return redirect('/get-fund-id');
    }
}
