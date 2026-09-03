<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Menyimpan komentar baru.
     */
    public function store(Request $request, Pin $pin)
    {
        $request->validate([
            'comments' => 'required|string|max:500',
        ]);

        Comments::create([
            'user_id' => Auth::id(),
            'pin_id' => $pin->id,
            'comments' => $request->comments,
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Komentar berhasil ditambahkan! 💬');
    }

    /**
     * Menghapus komentar.
     */
    public function destroy(Comments $comments)
    {
        // Hanya pemilik komentar yang boleh menghapus
        if ($comments->user_id !== Auth::id()) {
            abort(403);
        }

        $comments->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}