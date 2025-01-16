<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Department;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToLogin()
    {
        return redirect('/login')->with('login', true);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput()->with('login', true);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (isset($request->remember) && !empty($request->remember)) {
                setcookie('email', $request->email, time() + 3600);
                setcookie('password', $request->password, time() + 3600);
            } else {
                setcookie('email', '');
                setcookie('password', '');
            }

            if (!$user->verification_status == '1') {
                // Auth::logout();
                Alert::alert('Login Gagal', 'Akun anda belum terverifikasi. Silahkan verifikasi melalui email anda!', 'error');

                return redirect()->route('verification.resend.link')->with('login', true);
            }

            if (auth()->user()->role == 'superadmin' || 'admin') {
                return redirect()->route('home');
            } else if (auth()->user()->role == 'bem') {
                return redirect()->route('dashboard');
            }
        } else {
            Alert::alert('Login gagal, pastikan email atau password benar!');
            return redirect()->route('login')->withInput();
        }
    }

    public function showRegistrationForm()
    {
        $depts = Department::all();
        $prodis = Prodi::all();
        return view('auth.register', compact('depts', 'prodis'));
    }

    public function register(Request $request)
    {
        $existingUser = User::where('email', $request->input('email'))->where('verification_status', '0')->first();

        if ($existingUser) {
            $existingUser->delete();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'gender' => 'required',
            'dept_id' => 'required',
            'prodi_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput()->with('register', true);
        }

        $email = $request->email;
        $v_code = Str::random(32);

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'verification_id' => $v_code,
            'verification_status' => '0',
            'dept_id' => $request->dept_id,
            'prodi_id' => $request->prodi_id
        ]);

        // event(new Registered($user));

        $credentials = $request->only('email', 'password');

        $baseUrl = config('app.url');
        $verificationToken = $user->verification_id;
        $encryptedToken = encrypt($verificationToken);

        $verificationlink = $baseUrl . '/verify-mail/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return redirect()->route('verification.notice')->with('login', true);
        }
    }

    public function verifyNotice()
    {
        Alert::alert('Berhasil', 'Registrasi berhasil. Silahkan cek email anda untuk verifikasi.', 'success');
        return view('auth.verify');
    }

    public function verifyResend()
    {
        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        $baseUrl = config('app.url');

        $user->verification_id = Str::random(32);
        $user->save();

        $verificationToken = $user->verification_id;
        $encryptedToken = encrypt($verificationToken);

        $verificationlink = $baseUrl . '/verify-mail/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        Alert::alert('Login Gagal', 'Akun anda belum terverifikasi. Silahkan verifikasi melalui email anda!', 'error');
        return view('auth.verify');
    }

    // public function verifyEmail(EmailVerificationRequest $request, string $id)
    // {
    //     $request->fulfill();

    //     return redirect()->route('dashboard');
    // }

    public function verifyEmail($token)
    {
        $decrypt_token = decrypt($token);

        $user = User::where('verification_id', $decrypt_token)->first();

        if (!$user) {
            return redirect()->route('register')->withErrors(['verification_failed' => 'Link tautan verifikasi telah kedaluwarsa. Silakan coba lagi.'])->withInput()->with('register', true);
        }

        $user->verification_id = null;
        $user->verification_status = '1';
        $user->save();

        Alert::alert('Berhasil', 'Email anda telah terverifikasi', 'success');
        return redirect()->route('dashboard')->with('login', true);
    }

    public function verifyHandler(Request $request)
    {
        // $request->user()->sendEmailVerificationNotification();

        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        $baseUrl = config('app.url');
        $verificationToken = $user->verification_id;
        $encryptedToken = encrypt($verificationToken);

        $verificationlink = $baseUrl . '/verify-mail/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        return back()->with('success', 'Link verifikasi telah dikirim!');
    }
}
