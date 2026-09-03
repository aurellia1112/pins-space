<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Pin;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Like / Unlike Pin
     */
    public function toggle(Pin $pin)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('pin_id', $pin->id)
            ->first();

        if ($like) {
            // Kalau sudah like → hapus like
            $like->delete();

            return back()->with('success', 'Like dibatalkan.');
        }

        // Kalau belum like → buat like
        Like::create([
            'user_id' => Auth::id(),
            'pin_id' => $pin->id,
        ]);

        return back()->with('success', 'Pin disukai! ❤️');
    }
}