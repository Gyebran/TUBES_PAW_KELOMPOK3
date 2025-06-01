<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function getProfile()
    {
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'message' => 'Data Profil Ditemukan!',
            'user' => $user,
            ]);
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    public function updateProfile(request $request){
        $user = Auth::user();

        //ini buat validasi ingput
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => [
                'required',
                'string',
                'max:12',
                Rule::unique('users')->ignore($user->id),
            ],
            'jurusan' => 'nullable|string|max:255',
            'fakultas' => 'nullable|string|max:255',
            'foto_profile' => 'nullable|images|mimes:jpg,jpeg,png|max:2048'
        ]);

        //ini buat update data ya ges
        $user->nama = $request->nama;
        $user->nim = $request->nim;
        $user->jurusan = $request->jurusan;
        $user->fakultas = $request->fakultas;

        //upload foto bray
        if ($request->hasFile('foto_profile')){
            //hapus foto lama kalo udah ada
            if($user->foto_profile){
                Storage::disk('public')->delete($user->foto_profile);
            }

            $path = $request->file('foto_profile')->store('profile_pictures','public');
            $user->foto_profile = $path;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
