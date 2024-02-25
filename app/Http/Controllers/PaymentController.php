<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPayByFundId($fund_id)
    {
        return view('tickets.payments', ['fund_id' => $fund_id]);
    }

    public function setPayment(Request $request)
    {/*
        $validated = $request->validate([
            'ticket_id' => 'required|string',
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_no' => 'nullable|string',
            'participant_no' => 'nullable|int',
            'participant_info' => 'nullable|string',
            'payment_amount' => 'required|int',
            'payment_status' => 'nullable|string',
            // Add more validation rules as needed
        ]);*/
        // Create a new payment record
        $payment = new Payment([
            'ticket_id' => '673506',
            'name' => $request->payers_name,
            'email' => $request->payers_email,
            'phone_no' => $request->payers_phone,
            'participant_no' => 2,
            'participant_info' => null,
            'payment_amount' => 12,
            'payment_time' => Carbon::now(),
            'payment_status' => 'pending',
        ]);
        $payment->save();

        return redirect()->route('tickets.showByFundId', ['fund_id' => session('fund_id')])->with('success', 'Payment successful!');

    }
}
