<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryBackendController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::all();
        return view('page.backend.galeri.index', compact('galeris'));
    }


    // Form tambah galeri
    public function create()
    {
        return view('page.backend.galeri.create');
    }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'active' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'image' => $imagePath,
            'active' => $request->has('active') ? 1 : 0,
        ]);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Form edit galeri
    public function edit(Galeri $galeri)
    {
        return view('page.backend.galeri.edit', compact('galeri'));
    }

    // Update galeri
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            $galeri->image = $request->file('image')->store('galeri', 'public');
        }

        $galeri->title = $request->title;
        $galeri->active = $request->has('active') ? 1 : 0;
        $galeri->save();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        // Hapus file gambarnya dulu kalau ada
        if ($galeri->image) {
            Storage::disk('public')->delete($galeri->image);
        }

        // Hapus record di database
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus');
    }

    // Lihat detail galeri
    public function show(Galeri $galeri)
    {
        return view('page.backend.galeri.show', compact('galeri'));
    }
}
