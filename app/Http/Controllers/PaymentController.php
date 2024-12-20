<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
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
        $postContent = PostContent::where('fund_id', session('fund_id'))->first();

        $paymentRecipientInfo = PaymentRecipientInfo::where('user_id' , $postContent->user_id)->first();

        return view('tickets.payments', [
            'paymentRecipientInfo' => $paymentRecipientInfo,
            'ticket_price' => optional($postContent)->ticket_price,
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
            'message' => $request->input('payers_message'),
            'ref_no' => $request->input('ref_no'),
            'amount' => $request->input('total_amount'),
            'payment_date' => Carbon::now(),
            'status' => PaymentStatus::Pending,
        ]);
        $payment->save();

        return redirect()->route('tickets.showByFundId', ['fund_id' => session('fund_id')])->with('success', 'Payment pending! You will be sent email after confirmation.');
    }

    public function updateStatus(Request $request, PaymentRecipientInfo $payment)
    {
        $request->validate([
            'status' => 'required|in:none,pending,confirmed',
        ]);

        $payment->update(['status' => $request->status]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
