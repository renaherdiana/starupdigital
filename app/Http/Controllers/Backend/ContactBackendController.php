<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactBackendController extends Controller
{
    // Menampilkan semua contact
    public function index() {
        $contacts = Contact::all();
        return view('page.backend.contact.index', compact('contacts'));
    }

    // Form tambah contact
    public function create() {
        return view('page.backend.contact.create');
    }

    // Simpan contact baru
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        Contact::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact berhasil ditambahkan');
    }

    // Detail contact
    public function show($id) {
        $contact = Contact::findOrFail($id);
        return view('page.backend.contact.show', compact('contact'));
    }

    // Form edit contact
    public function edit($id) {
        $contact = Contact::findOrFail($id);
        return view('page.backend.contact.edit', compact('contact'));
    }

    // Update contact
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact berhasil diupdate');
    }

    // Hapus contact
    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact berhasil dihapus');
    }
}
