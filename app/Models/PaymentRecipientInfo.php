<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRecipientInfo extends Model
{
    protected $table = 'payment_recipient_info';
    protected $fillable = [
        'user_id',
        'recipient_name',
        'recipient_bank_acc',
        'recipient_mobilepay',
    ];
}
