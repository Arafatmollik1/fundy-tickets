<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketsSimplified extends Model
{
    protected $table = 'tickets_simplified';

    protected $fillable = [
        'fund_id',
        'ticket_user_name',
        'ticket_user_email',
        'ticket_user_phone',
        'ticket_quantity',
        'ticket_payment_id',
        'status',
    ];

    protected $casts = [
        'ticket_quantity' => 'integer',
        'status' => 'string',
    ];
}
