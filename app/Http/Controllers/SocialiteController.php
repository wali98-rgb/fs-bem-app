<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $userFromGoogle = Socialite::driver('google')->stateless()->user();

        $userFromDb = User::where('google_id', $userFromGoogle->getId())->first();

        if (!$userFromDb) {
            $userFromDb = new User();
            $userFromDb->email = $userFromGoogle->getEmail();
            $userFromDb->google_id = $userFromGoogle->getId();
            $userFromDb->name = $userFromGoogle->getName();
            $userFromDb->save();

            auth('web')->login($userFromDb);
            session()->regenerate();

            $email = auth()->user()->email;
            $user = User::where('email', $email)->first();

            $baseUrl = config('app.url');
            $verificationToken = $user->verification_id;
            $encryptedToken = encrypt($verificationToken);

            $verificationlink = $baseUrl . '/verify-mail/' . $encryptedToken;

            Mail::to($email)->send(new VerificationMail($verificationlink));

            return redirect()->route('verification.notice');
        }

        auth('web')->login($userFromDb);
        session()->regenerate();
        // return redirect()->route('home');
        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('home');
        } elseif (auth()->user()->role == 'admin') {
            return redirect()->route('home');
        } elseif (auth()->user()->role == 'bem') {
            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard');
    }
}
