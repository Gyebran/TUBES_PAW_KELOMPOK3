<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Karya; 

class BookmarkController extends Controller
{
    /**
     * Tampilkan semua bookmark milik user yang login
     */
    public function index()
    {
        $bookmarks = Bookmark::with('karya')->where('user_id', auth()->id())->get();

        return view('bookmark.index', compact('bookmarks'));
    }

    /**
     * Tampilkan form untuk membuat bookmark baru
     */
    public function create()
    {
        $karyas = Karya::all(); // jika butuh list karya untuk dipilih
        return view('bookmark.create', compact('karyas'));
    }

    /**
     * Simpan bookmark baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'karya_id' => 'required|exists:karyas,id',
        ]);

        Bookmark::firstOrCreate([
            'user_id' => auth()->id(),
            'karya_id' => $request->karya_id,
        ]);

        return redirect()->route('bookmark.index')->with('success', 'Bookmark berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu bookmark
     */
    public function show($id)
    {
        $bookmark = Bookmark::with('karya')->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('bookmark.show', compact('bookmark'));
    }

    /**
     * Tampilkan form edit bookmark
     */
    public function edit($id)
    {
        $bookmark = Bookmark::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $karyas = Karya::all();
        return view('bookmark.edit', compact('bookmark', 'karyas'));
    }

    /**
     * Update bookmark yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'karya_id' => 'required|exists:karyas,id',
        ]);

        $bookmark = Bookmark::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $bookmark->update([
            'karya_id' => $request->karya_id,
        ]);

        return redirect()->route('bookmark.index')->with('success', 'Bookmark berhasil diperbarui.');
    }

    /**
     * Hapus bookmark
     */
    public function destroy($id)
    {
        $bookmark = Bookmark::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $bookmark->delete();

        return redirect()->route('bookmark.index')->with('success', 'Bookmark berhasil dihapus.');
    }
}
