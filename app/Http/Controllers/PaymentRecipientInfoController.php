<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecipientInfo;
use Illuminate\Http\Request;

class PaymentRecipientInfoController extends Controller
{
    public function create()
    {
        $userId = auth()->id();

        $paymentRecipientInfo = PaymentRecipientInfo::where('user_id', $userId)->first();

        return view('payment-recipient-info.create', compact('paymentRecipientInfo'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_name' => 'required',
            'recipient_bank_acc' => 'nullable',
            'recipient_mobilepay' => 'nullable',
        ]);

        $validatedData['user_id'] = auth()->id();


        $paymentRecipientInfo = PaymentRecipientInfo::where('user_id', $validatedData['user_id'])->first();

        if ($paymentRecipientInfo) {
            $paymentRecipientInfo->update($validatedData);
        } else {
            PaymentRecipientInfo::create($validatedData);
        }

        return redirect()->route('super.dashboard')->with('success', 'Details added successfully!');
    }
}
