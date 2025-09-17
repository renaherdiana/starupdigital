<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutBackendController extends Controller
{
    // Tampilkan semua data About
    public function index()
    {
        $abouts = About::all();
        return view('page.backend.about.index', compact('abouts'));
    }

    // Form Tambah About
    public function create()
    {
        return view('page.backend.about.create');
    }

    // Simpan data baru About
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'experience'  => 'nullable|integer',
            'customers'   => 'nullable|integer',
            'phone'       => 'nullable|string|max:20',
            'is_active'   => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('abouts', 'public');
        }

        About::create([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $filename,
            'experience'  => $request->experience,
            'customers'   => $request->customers,
            'phone'       => $request->phone,
            'is_active'   => $request->has('is_active') ? 1 : 0, // <-- checkbox handling
        ]);

        return redirect()->route('about.index')->with('success', 'Data About berhasil ditambahkan');
    }

    // Detail About
    public function show($id)
    {
        $about = About::find($id);
        if (!$about) {
            return redirect()->route('about.index')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.about.show', compact('about'));
    }

    // Form Edit About
    public function edit($id)
    {
        $about = About::find($id);
        if (!$about) {
            return redirect()->route('about.index')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.about.edit', compact('about'));
    }

    // Update About
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        if (!$about) {
            return redirect()->route('about.index')->with('error', 'Data tidak ditemukan');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'experience'  => 'nullable|integer',
            'customers'   => 'nullable|integer',
            'phone'       => 'nullable|string|max:20',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($about->photo) {
                Storage::disk('public')->delete($about->photo);
            }
            $about->photo = $request->file('photo')->store('abouts', 'public');
        }

        $about->title       = $request->title;
        $about->description = $request->description;
        $about->experience  = $request->experience;
        $about->customers   = $request->customers;
        $about->phone       = $request->phone;
        $about->is_active   = $request->has('is_active') ? 1 : 0; // <-- checkbox handling

        $about->save();

        return redirect()->route('about.index')->with('success', 'Data About berhasil diupdate');
    }

    // Hapus About
    public function destroy($id)
    {
        $about = About::find($id);
        if ($about) {
            if ($about->photo) {
                Storage::disk('public')->delete($about->photo);
            }
            $about->delete();
        }

        return redirect()->route('about.index')->with('success', 'Data berhasil dihapus');
    }
}
