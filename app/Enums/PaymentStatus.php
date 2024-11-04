<?php

namespace App\Enums;

Enum PaymentStatus: string
{
    case None = 'none';
    case Pending = 'pending';
    case Confirmed = 'confirmed';
}
