<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    /**
     * Menampilkan semua bookmark milik user yang sedang login
     */
    public function index()
    {
        $bookmarks = Bookmark::with('karya')->where('user_id', auth()->id())->get();

        // Mengubah format output agar sesuai dengan yang digunakan di view
        $formatted = $bookmarks->map(function ($bookmark) {
            return [
                'id' => $bookmark->id,
                'nama_kegiatan' => $bookmark->karya->nama_kegiatan ?? '-',
                'deskripsi' => $bookmark->karya->deskripsi ?? '-',
                'tanggal' => $bookmark->karya->tanggal ?? '-',
                'poster' => $bookmark->karya->poster ?? null,
            ];
        });

        return response()->json($formatted);
    }

    /**
     * Menyimpan bookmark baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'karya_id' => 'required|exists:karyas,id',
        ]);

        $bookmark = Bookmark::firstOrCreate([
            'user_id' => auth()->id(),
            'karya_id' => $request->karya_id,
        ]);

        return response()->json($bookmark, 201);
    }

    /**
     * Menghapus bookmark berdasarkan ID
     */
    public function destroy($id)
    {
        $bookmark = Bookmark::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $bookmark->delete();

        return response()->json(['message' => 'Bookmark deleted']);
    }
}
