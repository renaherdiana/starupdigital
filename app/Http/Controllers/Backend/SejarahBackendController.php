<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahBackendController extends Controller
{
    // Tampilkan semua sejarah
    public function index()
    {
        $sejarahs = Sejarah::all();
        return view('page.backend.sejarah.index', compact('sejarahs'));
    }

    // Form tambah sejarah
    public function create()
    {
        return view('page.backend.sejarah.create');
    }

    // Simpan sejarah baru
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('sejarah', 'public');
        }

        Sejarah::create([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $filename,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil ditambahkan');
    }

    // Form edit sejarah
    public function edit($id)
    {
        $sejarah = Sejarah::find($id);
        if (!$sejarah) {
            return redirect()->route('sejarah.index')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.sejarah.edit', compact('sejarah'));
    }

    // Update sejarah
    public function update(Request $request, $id)
    {
        $sejarah = Sejarah::find($id);
        if (!$sejarah) {
            return redirect()->route('sejarah.index')->with('error', 'Data tidak ditemukan');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($sejarah->photo) {
                Storage::disk('public')->delete($sejarah->photo);
            }
            $sejarah->photo = $request->file('photo')->store('sejarah', 'public');
        }

        $sejarah->title       = $request->title;
        $sejarah->description = $request->description;
        $sejarah->is_active   = $request->has('is_active') ? 1 : 0;

        $sejarah->save();

        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil diupdate');
    }

    // Hapus sejarah
    public function destroy($id)
    {
        $sejarah = Sejarah::find($id);
        if ($sejarah) {
            if ($sejarah->photo) {
                Storage::disk('public')->delete($sejarah->photo);
            }
            $sejarah->delete();
        }

        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil dihapus');
    }

    // Toggle aktif/inaktif sejarah
    public function toggleActive($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->is_active = !$sejarah->is_active;
        $sejarah->save();

        return redirect()->route('sejarah.index')->with('success', 'Status sejarah berhasil diubah');
    }

    // Tampilkan detail sejarah
    public function show($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('page.backend.sejarah.show', compact('sejarah'));
    }
}
