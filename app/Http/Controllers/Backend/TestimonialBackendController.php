<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialBackendController extends Controller
{
    // Tampilkan semua testimonial
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('page.backend.testimonial.index', compact('testimonials'));
    }

    // Form tambah testimonial
    public function create()
    {
        return view('page.backend.testimonial.create');
    }

    // Simpan testimonial baru
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name'        => $request->name,
            'testimonial' => $request->testimonial,
            'photo'       => $filename,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil ditambahkan');
    }

    // Form edit testimonial
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return redirect()->route('testimonial.index')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.testimonial.edit', compact('testimonial'));
    }

    // Update testimonial
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return redirect()->route('testimonial.index')->with('error', 'Data tidak ditemukan');
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $testimonial->photo = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->name        = $request->name;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->is_active   = $request->has('is_active') ? 1 : 0;

        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil diupdate');
    }

    // Hapus testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $testimonial->delete();
        }

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dihapus');
    }

    // Toggle aktif/inaktif testimonial
    public function toggleActive($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Status testimonial berhasil diubah');
    }
    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('page.backend.testimonial.show', compact('testimonial'));
    }

}
