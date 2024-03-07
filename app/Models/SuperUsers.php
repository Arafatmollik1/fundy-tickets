<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class SuperUsers extends Model
{
    use HasFactory;

    public static function getEventInfo(): array|Collection|null
    {
        $userEmail = Auth::user()->email;
        $superUser = self::where('email', trim($userEmail))->first();

        if ($superUser) {
            $fundIds = json_decode($superUser->all_fund_ids, true);

            if (is_array($fundIds) && count($fundIds) > 0) {
                return PostContentSimplified::whereIn('fund_id', $fundIds)->get();
            }
        }

        return [];

    }
}
