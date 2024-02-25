<?php

namespace App\Http\Controllers;

use App\Models\PaymentsSimplified;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $payment = new PaymentsSimplified([
            'payment_id' => Str::uuid(),
            'user_id' => auth()->id(),
            'fund_id' => session('fund_id'),
            'payers_name' => $request->input('payers_name'),
            'payers_email' => $request->input('payers_email'),
            'payers_phone' => $request->input('payers_phone'),
            'participant_no' => $request->input('participants'),
            'amount' => 12,
            'payment_date' => Carbon::now(),
            'status' => 'pending',
        ]);
        $payment->save();

        return redirect()->route('tickets.showByFundId', ['fund_id' => session('fund_id')])->with('success', 'Payment successful!');

    }
}
