<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Socialite\Contracts\User as SocialiteUser;

/**
 * Class User
 *
 * @property int $id
 * @property string $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $fund_id
 * @property Carbon $created_at
 * @property Carbon|null $last_login
 * @property string|null $ref_id
 */
class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $table = 'users';

    protected $casts = [
        'last_login' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'fund_id',
        'last_login',
        'ref_id',
    ];

    /**
     * @throws \Exception
     */
    public static function findOrCreate(SocialiteUser $socialiteUser): User
    {
        // Attempt to retrieve the user by their socialite ID or email
        $authUser = self::where('email', $socialiteUser->getEmail())->first();

        if ($authUser) {
            $authUser->last_login = now();
            $authUser->save();

            return $authUser;
        }

        // If the user does not exist, create a new user instance
        $authUser = new self();

        $fundId = session('fund_id');
        // Check if fund_id is null and throw an exception if true
        if (is_null($fundId)) {
            throw new \Exception('No fund_id found in session.');
        }
        $authUser->fund_id = $fundId;

        $authUser->name = $socialiteUser->getName();
        $authUser->email = $socialiteUser->getEmail();
        $authUser->user_id = $socialiteUser->getId();
        $authUser->last_login = now();
        $authUser->save();

        return $authUser;
    }
}
