<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinController extends Controller
{
    /**
     * Menampilkan halaman Home.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pins = Pin::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('home', compact('pins'));
    }

    /**
     * Menampilkan halaman untuk membuat Pin.
     */
    public function create()
    {
        return view('pins.create');
    }

    /**
     * Menyimpan Pin baru.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'required|file|max:51200|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,webm,mp3,wav,m4a,aac,ogg',
        ]);

        // Mengambil file yang di-upload
        $file = $request->file('media');

        // Menyimpan file ke storage/app/public/pins
        $path = $file->store('pins', 'public');

        // Menentukan jenis media
        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image/')) {
            $mediaType = 'image';
        } elseif (str_starts_with($mimeType, 'video/')) {
            $mediaType = 'video';
        } elseif (str_starts_with($mimeType, 'audio/')) {
            $mediaType = 'audio';
        } else {
            return back()
                ->withErrors([
                    'media' => 'Jenis file tidak didukung.',
                ])
                ->withInput();
        }
        

        // Menyimpan data Pin ke database
        Pin::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'media' => $path,
            'media_type' => $mediaType,
        ]);

        // Kembali ke Home
        return redirect()
            ->route('home')
            ->with('success', 'Pin berhasil dibuat! 📌');
    }

    /**
     * Menghapus Pin
    */
    public function destroy(Pin $pin)
    {
        // Hapus file media dari storage
        if ($pin->media && \Storage::disk('public')->exists($pin->media)) {
            \Storage::disk('public')->delete($pin->media);
        }

        // Hapus data pin dari database
        $pin->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Pin berhasil dihapus! 🗑️');
    }
    /**
 * Menyimpan komentar
 */
public function storeComments(Request $request, Pin $pin)
{
    $request->validate([
        'comments' => 'required|string|max:1000',
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
}
