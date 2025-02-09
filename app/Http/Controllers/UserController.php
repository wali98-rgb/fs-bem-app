<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\Department;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $depts = Department::all();

        if ($users->isEmpty()) {
            $userisAccessBySuperadmin = User::all();
            $userisAccess = User::all();
            $userBem = User::all();
            $userBemAdmin = User::all();
            $userAdmin = User::all();
        } else {
            // $user = User::orderBy('name', 'asc')->paginate('10');
            // Memfilter pengguna dengan role 'bem' dan 'admin', kecuali 'superadmin'
            $userBem = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->join('departments', 'users.dept_id', '=', 'departments.id')
                ->orderBy('departments.id', 'asc')
                ->select('users.*')
                ->paginate(10);

            $userBemAdmin = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->where('dept_id', Auth::user()->dept_id)
                ->orderBy('name', 'asc')
                ->paginate(10);

            $userAdmin = User::withRoles(['admin'])
                ->with('department', 'prodi')
                ->orderBy('name', 'asc')
                ->paginate(10);

            $userisAccessBySuperadmin = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->join('departments', 'users.dept_id', '=', 'departments.id')
                ->where('access_user', '1')
                ->orderBy('departments.id', 'asc')
                ->select('users.*')
                ->paginate(10);

            // Memfilter pengguna dengan role 'bem' dan status akses = 1
            $userisAccess = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->where('dept_id', Auth::user()->dept_id)
                ->where('access_user', '1')
                ->orderBy('name', 'asc')
                ->paginate(10);
        }

        $title = 'Hapus Akun Pengguna!';
        $text = 'Anda yakin ingin menghapusnya?';
        confirmDelete($title, $text);

        return view('admin.pages.users.index', compact('userBem', 'userAdmin', 'userisAccessBySuperadmin', 'userisAccess', 'userBemAdmin', 'depts'));
    }

    public function showAccess()
    {
        $users = User::all();
        $depts = Department::all();

        if ($users->isEmpty()) {
            $user = User::all();
        } else {
            // $user = User::orderBy('name', 'asc')->paginate('10');
            // Memfilter pengguna dengan role 'bem' dan 'admin', kecuali 'superadmin'
            $user = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->join('departments', 'users.dept_id', '=', 'departments.id')
                ->where('access_user', '0')
                ->orderBy('departments.id', 'asc')
                ->select('users.*')
                ->paginate(10);

            $userBemAdmin = User::withRoles(['bem'])
                ->with('department', 'prodi')
                ->where('dept_id', Auth::user()->dept_id)
                ->where('access_user', '0')
                ->orderBy('name', 'asc')
                ->paginate(10);
        }

        return view('admin.pages.users.user_access', compact('user', 'depts', 'userBemAdmin'));
    }

    public function addAccess(Request $request)
    {
        $request->validate([
            'access_user' => 'required|array',
            'access_user.*' => 'exists:users,id'
        ]);

        User::whereIn('id', $request->access_user)->update(['access_user' => '1']);

        Alert::toast('Akses telah diberikan.', 'success');
        return redirect()->back();
    }

    public function editAccess($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'access_user' => '0'
        ]);

        Alert::alert('Berhasil', 'Akses pengguna telah dihapus.', 'success');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $depts = Department::all();
        $prodis = Prodi::all();

        return view('admin.pages.users.create', compact('depts', 'prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role === 'superadmin') {
            $request->validate([
                'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:5000000',
                'name' => 'required|min:2',
                'email' => 'required|email',
                'password' => 'required',
                'gender' => 'required',
                'role' => 'required',
                'dept_id' => 'required',
                'prodi_id' => 'required'
            ]);
        } else if (Auth::user()->role === 'admin') {
            $request->validate([
                'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:5000000',
                'name' => 'required|min:2',
                'email' => 'required|email',
                'password' => 'required',
                'gender' => 'required',
                'prodi_id' => 'required'
            ]);
        }

        // Inisialisasi variable untuk menyimpan nama file
        $image_name = null;

        // Menyimpan gambar ke storage project
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $image_name = time() . '_' . $photo->hashName();
            $photo->move(public_path('images/profile_img'), $image_name);
            $image_path = 'images/profile_img/' . $image_name;
        } else {
            $image_path = NULL;
        }

        $email = $request->email;
        $v_code = Str::random(32);

        $existingEmail = User::where('email', $email)->first();

        if ($existingEmail) {
            Alert::alert('Duplikasi', 'Email sudah terdaftar, gunakan email lain.', 'error');
            return redirect()->back();
        }

        // Menyimpan gambar ke database
        if (Auth::user()->role === 'superadmin') {
            $user = User::create([
                'photo' => $image_path,
                'name' => $request->name,
                'email' => $email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'verification_id' => $v_code,
                'verification_status' => '0',
                'role' => $request->role,
                'dept_id' => $request->dept_id,
                'prodi_id' => $request->prodi_id
            ]);
        } else if (Auth::user()->role === 'admin') {
            $user = User::create([
                'photo' => $image_path,
                'name' => $request->name,
                'email' => $email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'verification_id' => $v_code,
                'verification_status' => '0',
                'dept_id' => Auth::user()->dept_id,
                'prodi_id' => $request->prodi_id
            ]);
        }

        $baseUrl = config('app.url');
        $verificationToken = $user->verification_id;
        $encryptedToken = encrypt($verificationToken);

        $verificationlink = $baseUrl . '/verify-code/' . $encryptedToken;

        Mail::to($email)->send(new VerificationMail($verificationlink));

        Alert::alert('Berhasil', 'Pengguna berhasil ditambahkan. Link verifikasi telah dikirim ke email yang didaftarkan.', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $depts = Department::all();
        $prodis = Prodi::all();

        return view('admin.pages.users.edit', compact('user', 'depts', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role === 'superadmin') {
            $request->validate([
                'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:5000000',
                'name' => 'required|min:2',
                'email' => 'required|email',
                'role' => 'required',
                'dept_id' => 'required'
            ]);
        } else if (Auth::user()->role === 'admin') {
            $request->validate([
                'name' => 'required|min:2',
                'email' => 'required|email'
            ]);
        }

        $user = User::findOrFail($id);

        $image_path = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $image_name = time() . '_' . $photo->hashName();
            $photo->move(public_path('images/profile_img'), $image_name);
            $image_path = 'images/profile_img/' . $image_name;

            if (file_exists($user->photo)) {
                unlink($user->photo);
            }

            $user->update([
                'photo' => $image_path,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'dept_id' => $request->dept_id
            ]);
        } else {
            if (Auth::user()->role === 'superadmin') {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'dept_id' => $request->dept_id
                ]);
            } else if (Auth::user()->role === 'admin') {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
            }
        }

        Alert::toast('Data pengguna berhasil diperbarui.', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (file_exists($user->photo)) {
            unlink($user->photo);
        }

        $user->delete();

        Alert::alert('Berhasil', 'Pengguna berhasil dihapus.', 'success');
        return redirect()->back();
    }


    // Login Function
    public function showLoginForm()
    {
        return view('auth.Login.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed, redirect to intended route
            return redirect()->intended('/');
        }

        // Authentication failed, redirect back with input and error message
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Register Function
    public function showRegistrationForm()
    {
        $prodis = Prodi::all();
        return view('auth.Register.register', compact('prodis'));
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:0,1',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role' => 'guest',
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the intended route
        return redirect()->intended('login');
    }
}
