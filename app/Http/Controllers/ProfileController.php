<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $prodi = Prodi::pluck('name_prodi', 'id'); // Ambil hanya nama_prodi dan id sebagai key-value pair
        return view('client.pages.profile', [
            'user' => Auth::user(),
            'prodi' => $prodi
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            $photo = $request->file('photo');
            $filename = time().'_'.$photo->getClientOriginalName();
            $path = $photo->storeAs('profile-photos', $filename, 'public');
            $validated['photo'] = 'storage/'.$path;
        }

        $user->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

}
