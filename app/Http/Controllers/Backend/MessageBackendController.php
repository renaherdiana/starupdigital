<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageBackendController extends Controller
{
    /**
     * Tampilkan semua pesan masuk
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10); // urutkan dari terbaru
        return view('page.backend.messages.index', compact('messages')); // folder plural biar konsisten
    }

    /**
     * Hapus pesan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
