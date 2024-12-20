<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google for authentication.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     *
     * @throws \Exception
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $authUser = User::findOrCreate($user);
        Auth::login($authUser, true);

        if (Auth::check()) {
            return redirect()->route('super.dashboard');
        }

        return redirect()->route('login');
    }
}
