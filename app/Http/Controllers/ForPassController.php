<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetTemp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ForPassController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Alert::alert('Gagal Memuat', 'Email tidak terdaftar.', 'error');
            return redirect()->route('forgot.password.get')->withInput();
        }

        $lastReset = PasswordResetTemp::where('email', $user->email)->first();
        $expiredTime = 60;

        if ($lastReset) {
            $expiredDate = Carbon::parse($lastReset->expDate)->subSeconds($expiredTime);
            $elapsedTime = $expiredDate->diffInSeconds(Carbon::now());
            $timeRemaining = $expiredTime - $elapsedTime;
            $sisaWaktu = intval($timeRemaining);

            if ($elapsedTime < $expiredTime) {
                Alert::alert('Gagal Memuat', "Permintaan reset password akan dikirim lagi dalam $sisaWaktu detik.", 'error');
                return redirect()->route('forgot.password.get')->withInput();
            }
        }

        $reset = PasswordResetTemp::updateOrCreate(
            ['email' => $user->email],
            ['key' => mt_rand(100000, 999999), 'expDate' => Carbon::now()->addSeconds($expiredTime)]
        );

        $baseUrl = config('app.url');
        $verificationToken = $reset->key;
        $encryptedToken = encrypt($verificationToken);

        $resetPasswordLink = $baseUrl . '/reset/password/' . $encryptedToken;

        Mail::to($user->email)->send(new ResetPasswordMail($resetPasswordLink));

        Alert::alert('Berhasil', 'Email telah dikirim untuk mereset kata sandi.', 'success');
        return redirect()->route('forgot.password.get')->with('login', true);
    }

    public function showResetPasswordForm($token)
    {
        $decrypted_token = decrypt($token);

        $reset = PasswordResetTemp::where('key', $decrypted_token)->first();

        if (!$reset) {
            Alert::alert('Invalid', 'Tautan reset password tidak valid.', 'error');
            return redirect()->route('forgot.password.get');
        }

        $expiredTime = 60;
        $expiredDate = Carbon::parse($reset->expDate)->subMinutes($expiredTime);
        $elapsedTime = $expiredDate->diffInMinutes(Carbon::now());

        if ($elapsedTime >= $expiredTime) {
            Alert::alert('Kedaluwarsa', 'Tautan reset password telah kedaluwarsa.', 'error');
            return redirect()->route('forgot.password.get');
        }

        return view('auth.forgot-password-link', compact('token'));
    }

    public function submitResetPasswordForm(Request $request, $token)
    {
        $decrypted_token = decrypt($token);

        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $reset = PasswordResetTemp::where('key', $decrypted_token)->first();

        if (!$reset) {
            Alert::alert('Invalid', 'Tautan reset password tidak valid.', 'error');
            return redirect()->route('forgot.password.get')->withInput();
        }

        $expiredTime = 60;
        $expiredDate = Carbon::parse($reset->expDate)->subMinutes($expiredTime);
        $elapsedTime = $expiredDate->diffInMinutes(Carbon::now());

        if ($elapsedTime >= $expiredTime) {
            Alert::alert('Kedaluwarsa', 'Tautan reset password telah kedaluwarsa.', 'error');
            return redirect()->route('forgot.password.get');
        }

        $user = User::where('email', $reset->email)->first();

        if ($user->password === null) {
            $user->password = Hash::make($request->password);
            $user->save();

            $reset->delete();

            Alert::alert('Berhasil', 'Password telah direset, Silahkan login dengan password baru.', 'success');
            return redirect()->route('login')->with('login', true);
        } else if ($user->password !== null) {
            if (Hash::check($request->password, $user->password)) {
                Alert::alert('Peringatan', 'Password baru tidak boleh sama dengan password sebelumnya.', 'error');
                return redirect()->back()->withInput();
            }

            $user->password = Hash::make($request->password);
            $user->save();

            $reset->delete();

            Alert::alert('Berhasil', 'Password telah direset, Silahkan login dengan password baru.', 'success');
            return redirect()->route('login')->with('login', true);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            $response = [
                'response' => 0,
                'message' => 'Something error check confirmation password and required min. 8 character.'
            ];

            return response()->json($response, 200);
        }

        $user = Auth::user();
        $userCheck = User::select('*')->where('id', $user->id)->first();
        $newPassword = $request->new_password;

        $oldPassword = $request->old_password;
        $currentPassword = $userCheck->password;
        $validCurrentPassword = Hash::check($oldPassword, $currentPassword);

        if ($validCurrentPassword) {
            User::where('id', $user->id)->update([
                'password' => Hash::make($newPassword)
            ]);

            $response = [
                'response' => 1,
                'message' => "Success password has been changed : $newPassword"
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'response' => 0,
                'message' => 'Error old password is wrong.'
            ];
            return response()->json($response, 200);
        }
    }
}
