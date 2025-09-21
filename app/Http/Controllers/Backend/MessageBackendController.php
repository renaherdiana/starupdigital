<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageBackendController extends Controller
{
    /**
     * Tampilkan semua pesan masuk
     */
    public function index()
    {
        // Ambil pesan terbaru dan paginasi 10 per halaman
        $messages = Message::latest()->paginate(10);
        return view('page.backend.messages.index', compact('messages'));
    }

    /**
     * Tampilkan detail pesan
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('page.backend.messages.show', compact('message'));
    }

    /**
     * Hapus pesan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')
                         ->with('success', 'Pesan berhasil dihapus.');
    }
}
