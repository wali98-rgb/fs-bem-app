<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Department;
use App\Models\DivisionCodeQuilify;
use App\Models\PasswordResetTemp;
use App\Models\Prodi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
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
        $email = $request->email;
        $exist = User::where('email', $email)->exists();
        $hasPassword = User::where('email', $email)->first();

        if ($exist) {
            if ($hasPassword->password !== null) {
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
                    } else if ($user->verification_status == '1' && $user->status_quilify == 'N') {
                        Alert::alert('Login Gagal', 'Akun anda belum terverifikasi. Silahkan verifikasi melalui email anda!', 'error');
                        return redirect()->route('verification.resend.link')->with('login', true);
                    } else if ($user->status_quilify == 'N') {
                        Alert::alert('Login Gagal', 'Akun anda belum terverifikasi. Silahkan verifikasi melalui email anda!', 'error');
                        return redirect()->route('verification.resend.link')->with('login', true);
                    }

                    if (in_array($user->role, ['superadmin', 'admin'])) {
                        return redirect()->route('home');
                    } else if ($user->role === 'bem') {
                        return redirect()->route('dashboard');
                    }
                } else {
                    Alert::alert('Galat', 'Pastikan email atau password benar!', 'error');
                    return redirect()->route('login')->withInput();
                }
            } else if ($hasPassword->password === null) {
                Alert::alert('Login Gagal', 'Password belum diatur.', 'error');
                return redirect()->route('login')->withInput();
            }
        } else {
            Alert::alert('Gagal Memuat', 'Email belum terdaftar.', 'error');
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

        $verificationlink = $baseUrl . '/verify-code/' . $encryptedToken;

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

        $verificationlink = $baseUrl . '/verify-code/' . $encryptedToken;
        // $verificationlink = $baseUrl . '/verify-mail/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        Alert::alert('Login Gagal', 'Akun anda belum terverifikasi. Silahkan verifikasi melalui email anda!', 'error');
        return view('auth.verify');
    }

    public function verifyResendMail()
    {
        Alert::alert('Berhasil', 'Link verifikasi telah dikirim. Silahkan cek email Anda.', 'success');
        return view('auth.verify');
    }

    public function showCodeDivision($token)
    {
        $decrypted_token = decrypt($token);

        $user = User::where('verification_id', $decrypted_token)->first();
        $userEmail = User::where('email', auth()->user()->email)->first();

        if (!$user) {
            Alert::alert('Invalid', 'Tautan kode verifikasi tidak valid. Login kembali.', 'error');
            return redirect()->route('login');
        }

        $expiredTime = 60;

        $reset = DivisionCodeQuilify::updateOrCreate(
            ['email' => $user->email],
            ['key' => mt_rand(100000, 999999), 'expDate' => Carbon::now()->addSeconds($expiredTime)]
        );

        $keyCode = $reset->key;
        $codeExp = DivisionCodeQuilify::where('key', $keyCode)->first();

        $expiredDate = Carbon::parse($codeExp->expDate)->subMinutes($expiredTime);
        $elapsedTime = $expiredDate->diffInMinutes(Carbon::now());

        if ($elapsedTime >= $expiredTime) {
            Alert::alert('Kedaluwarsa', 'Tautan kode verifikasi telah kedaluwarsa. Silahkan login kembali.', 'error');
            return redirect()->route('login');
        }

        return view('auth.verify-code', compact('token'));
    }

    public function submitCodeDivision(Request $request, $token)
    {
        $decrypted_token = decrypt($token);

        $user = User::where('verification_id', $decrypted_token)->first();

        if (!$user) {
            Alert::alert('Invalid', 'Tautan kode verifikasi tidak valid. Login kembali.', 'error');
            return redirect()->route('login');
        }

        $codeDivision = $request->code_division;
        $dept = Department::where('kode_dpt', $codeDivision)->first();

        $dept_id = $dept->id;

        // PiSP24 : kode untuk posisi inti
        // DkSP01 : kode untuk departemen pendidikan
        // DkSP02 : kode untuk departemen sosial
        // DkSP03 : kode untuk departemen ekonomi
        // DkSP04 : kode untuk departemen komdigi
        // DkSP05 : kode untuk departemen agama
        // DkSP06 : kode untuk departemen olahraga
        // if ($codeDivision == 'PiSP24') {
        //     $user->dept_id = null;
        // } else if ($codeDivision == 'DkSP01') {
        //     $user->dept_id = 2; // Pendidikan
        // } else if ($codeDivision == 'DkSP02') {
        //     $user->dept_id = 4; // Sosial
        // } else if ($codeDivision == 'DkSP03') {
        //     $user->dept_id = 3; // Ekonomi
        // } else if ($codeDivision == 'DkSP04') {
        //     $user->dept_id = 1; // Komdigi
        // } else if ($codeDivision == 'DkSP05') {
        //     $user->dept_id = 6; // Agama
        // } else if ($codeDivision == 'DkSP06') {
        //     $user->dept_id = 5; // Olahraga

        if ($user->dept_id === $dept_id || $user->dept_id === null) {
            if ($codeDivision) {
                $user->dept_id = $dept->id;
            } else {
                Alert::alert('Invalid', 'Kode divisi tidak valid.', 'error');
                return redirect()->back()->withInput();
            }
        } else if ($user->dept_id !== $dept_id) {
            Alert::alert('Galat', 'Kode divisi tidak sesuai dengan departemen yang dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        $user->verification_id = null;
        $user->verification_status = '1';
        $user->status_quilify = 'Y';
        $user->save();

        Alert::alert('Berhasil', 'Email anda telah terverifikasi', 'success');
        return redirect()->route('dashboard')->with('login', true);
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

        Alert::alert('Berhasil', 'Email anda telah terverifikasi.', 'success');
        return redirect()->route('dashboard')->with('login', true);
    }

    public function verifyHandler(Request $request)
    {
        // $request->user()->sendEmailVerificationNotification();

        $email = auth()->user()->email;
        $user = User::where('email', $email)->first();

        $baseUrl = config('app.url');

        $user->verification_id = Str::random(32);
        $user->save();

        $verificationToken = $user->verification_id;
        $encryptedToken = encrypt($verificationToken);

        $verificationlink = $baseUrl . '/verify-code/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        return redirect()->route('verification.resend.mail');
    }
}
