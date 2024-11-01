<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'remember_token',
    ];

    public static function findOrCreate(SocialiteUser $socialiteUser): User
    {
        $users = self::where('email', $socialiteUser->getEmail())->get();

        if ($users->isNotEmpty()) {
            return $users->first();
        }

        $authUser = new User();
        $authUser->name = $socialiteUser->getName();
        $authUser->email = $socialiteUser->getEmail();
        $authUser->save();

        return $authUser;
    }

}
