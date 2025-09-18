<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageFrontendController extends Controller
{
    /**
     * Simpan pesan dari form contact (frontend).
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect balik ke halaman contact dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
