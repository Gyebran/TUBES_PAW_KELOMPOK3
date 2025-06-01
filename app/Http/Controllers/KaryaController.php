<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    public function index()
    {
        $karyas = Karya::with('user')->latest()->get();
        return view('dashboard', compact('karyas'));
    }

    public function create()
    {
        return view('karya.tambahKarya');
    }


    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
            'link' => 'required|url',
            'deskripsi' => 'required|string|max:1000',
        ]);

        $path = $request->file('gambar')->store('images', 'public');

        Auth::user()->karyas()->create([
            'gambar' => $path,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dashboard')->with('success', 'Karya berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karya = Karya::findOrFail($id);

        // Cek kepemilikan karya
        if ($karya->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('karya.editKarya', compact('karya'));
    }

    public function update(Request $request, $id)
    {
        $karya = Karya::findOrFail($id);

        if ($karya->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'gambar' => 'nullable|image|max:2048', 
            'link' => 'required|url',
            'deskripsi' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $karya->gambar = $path;
        }

        $karya->link = $request->link;
        $karya->deskripsi = $request->deskripsi;
        $karya->save();

        return redirect()->route('dashboard')->with('success', 'Karya berhasil diupdate');
    }


    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        if ($karya->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $karya->delete();

        return redirect()->route('dashboard')->with('success', 'Karya berhasil dihapus');
    }
}
