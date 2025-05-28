<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Karya;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Menyimpan komentar baru
     */
    public function store(Request $request, $karya_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Komentar::create([
            'user_id' => Auth::id(),
            'karya_id' => $karya_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit komentar (jika pakai modal atau halaman khusus)
     */
    public function edit($id)
    {
        $komentar = Komentar::findOrFail($id);

        // Cek jika komentar milik user yang login
        if ($komentar->user_id !== Auth::id()) {
            abort(403, 'Tidak punya akses');
        }

        return view('komentar.edit', compact('komentar'));
    }

    /**
     * Update komentar
     */
    public function update(Request $request, $id)
    {
        $komentar = Komentar::findOrFail($id);

        if ($komentar->user_id !== Auth::id()) {
            abort(403, 'Tidak punya akses');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $komentar->update([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui.');
    }

    /**
     * Hapus komentar
     */
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);

        if ($komentar->user_id === Auth::id() || Auth::user()->is_admin) {
            $komentar->delete();
            return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
        }

        abort(403, 'Tidak punya akses');
    }
}
