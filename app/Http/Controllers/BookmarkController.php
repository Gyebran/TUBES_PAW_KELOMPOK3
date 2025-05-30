<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        return Bookmark::with('karya')->where('user_id', auth()->id())->get();
    }

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

    public function destroy($id)
    {
        $bookmark = Bookmark::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $bookmark->delete();

        return response()->json(['message' => 'Bookmark deleted']);
    }
}
