<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmationMail;
use App\Models\Payment;
use App\Models\PaymentRecipientInfo;
use App\Models\PostContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;

class PaymentController extends Controller
{
    public function showPayByFundId()
    {
        return view('tickets.payments',
            [
                'paymentRecipientInfo' => PaymentRecipientInfo::where('fund_id', session('fund_id'))
                    ->first(),
                'ticket_price' => PostContent::where('fund_id', session('fund_id'))
                    ->first()
                    ->ticket_price,
            ]);
    }

    public function setPayment(Request $request)
    {
        $payment = new Payment([
            'payment_id' => Str::uuid(),
            'user_id' => rand(1, 100),
            'fund_id' => session('fund_id'),
            'payers_name' => $request->input('payers_name'),
            'payers_email' => $request->input('payers_email'),
            'payers_phone' => $request->input('payers_phone'),
            'participant_no' => $request->input('participants'),
            'ref_no' => $request->input('ref_no'),
            'amount' => $request->input('total_amount'),
            'payment_date' => Carbon::now(),
            'status' => 'pending',
        ]);
        $payment->save();

        // Send the email
        Mail::to($request->input('payers_email'))->send(new PaymentConfirmationMail($payment));

        return redirect()->route('tickets.showByFundId', ['fund_id' => session('fund_id')]);

    }
}
