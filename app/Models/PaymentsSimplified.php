<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsSimplified extends Model
{
    protected $table = 'payments_simplified';

    // Fillable attributes for mass assignment
    protected $fillable = ['payment_id', 'user_id', 'fund_id',
        'payers_name', 'payers_email', 'ref_no', 'payers_phone',
        'participant_no', 'amount', 'payment_date', 'status'];
}
