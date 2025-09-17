<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersBackendController extends Controller
{
    // Tampilkan semua partners
    public function index()
    {
        $partners = Partner::all();
        return view('page.backend.partners.index', compact('partners'));
    }

    // Form tambah partner
    public function create()
    {
        return view('page.backend.partners.create');
    }

    // Simpan partner baru
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('partners', 'public');
        }

        Partner::create([
            'name'        => $request->name,
            'description' => $request->description,
            'photo'       => $filename,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('partners.index')->with('success', 'Partner berhasil ditambahkan');
    }

    // Form edit partner
    public function edit($id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect()->route('partners.index')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.partners.edit', compact('partner'));
    }

    // Update partner
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect()->route('partners.index')->with('error', 'Data tidak ditemukan');
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($partner->photo) {
                Storage::disk('public')->delete($partner->photo);
            }
            $partner->photo = $request->file('photo')->store('partners', 'public');
        }

        $partner->name        = $request->name;
        $partner->description = $request->description;
        $partner->is_active   = $request->has('is_active') ? 1 : 0;

        $partner->save();

        return redirect()->route('partners.index')->with('success', 'Partner berhasil diupdate');
    }

    // Hapus partner
    public function destroy($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            if ($partner->photo) {
                Storage::disk('public')->delete($partner->photo);
            }
            $partner->delete();
        }

        return redirect()->route('partners.index')->with('success', 'Partner berhasil dihapus');
    }

    // Toggle aktif/inaktif partner
    public function toggleActive($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->is_active = !$partner->is_active;
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'Status partner berhasil diubah');
    }

    // Tampilkan detail partner
    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        return view('page.backend.partners.show', compact('partner'));
    }
}
