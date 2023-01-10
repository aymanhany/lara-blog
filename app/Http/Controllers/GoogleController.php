<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleCallback()
    {

        // try to call google driver and work with it
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())->first();

            // if user not in database then create new one and log it in
            if (!$user) {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'email' => $googleUser->getEmail()
                ]);

                Auth::login($newUser);

                // after login send user to dashboard
                return redirect('/dashboard');
            } else {
                // if user already exists log it in 
                Auth::login($user);
                // after login send user to dashboard
                return redirect('/dashboard');
            }
        } catch (Throwable $error) {
            // Show an error if social login with google have issues
            throw ($error);
        }
    }
}
