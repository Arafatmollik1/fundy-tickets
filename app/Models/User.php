<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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
        $fundId = session('fund_id');
        // Check if fund_id is null and throw an exception if true
        if (is_null($fundId)) {
            throw new \Exception('No fund_id found in session.');
        }

        // Attempt to retrieve all users by their email
        $users = self::where('email', $socialiteUser->getEmail())->get();

        $authUser = null;
        // Iterate over users to find a match for fundId
        foreach ($users as $user) {
            if ($user->fund_id == $fundId) {
                $authUser = $user;
                break;
            }
        }

        // If no matching user is found, create a new user
        if (! $authUser) {
            $authUser = new self();
            $authUser->fund_id = $fundId;
            $authUser->name = $socialiteUser->getName();
            $authUser->email = $socialiteUser->getEmail();
            $authUser->user_id = $socialiteUser->getId();
            $authUser->ref_id = self::generateUniqueRefID($authUser->name, $fundId);
        }

        $authUser->last_login = now();
        $authUser->save();

        return $authUser;
    }

    public static function generateUniqueRefID($userName, $fundId): string
    {
        $refID = $fundId.preg_replace('/\s+/', '', $userName).rand(1000, 9999);

        return strtoupper($refID);
    }

    public static function isSuperUser(): bool
    {
        return SuperUsers::where('email', Auth::user()->email)->count() > 0;
    }
}
