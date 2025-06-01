<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Komentar;

class KomentarController extends Controller
{
    public function index()
    {
        // Ambil semua komentar dari database
        $komentars = Komentar::all();

        // Kirim ke view komentar.blade.php
        return view('komentar', compact('komentars'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|integer',
            'karya_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        // Simpan komentar ke database
        Komentar::create($request->all());

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dikirim!');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }
}