<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message; // pastikan model Message sudah ada

class MessageBackendController extends Controller
{
    /**
     * Tampilkan semua pesan masuk
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10); // urutkan dari terbaru
        return view('page.backend.message.index', compact('messages'));
    }

    /**
     * Tampilkan detail pesan
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('page.backend.message.show', compact('message'));
    }

    /**
     * Hapus pesan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('message.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
