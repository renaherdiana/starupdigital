<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenagaKerjaBackendController extends Controller
{
    // Tampilkan semua tenaga kerja
    public function index()
    {
        $tenagakerjas = TenagaKerja::all(); // pastikan nama variabel konsisten
        return view('page.backend.tenagakerja.index', compact('tenagakerjas'));
    }

    // Form tambah tenaga kerja
    public function create()
    {
        return view('page.backend.tenagakerja.create');
    }

    // Simpan tenaga kerja baru
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'  => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('tenagakerja', 'public');
        }

        TenagaKerja::create([
            'name'       => $request->name,
            'profession' => $request->profession,
            'photo'      => $filename,
            'is_active'  => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('tenaga-kerja.index')->with('success', 'Tenaga Kerja berhasil ditambahkan');
    }

    // Form edit tenaga kerja
    public function edit($id)
    {
        $tenagaKerja = TenagaKerja::findOrFail($id);
        return view('page.backend.tenagakerja.edit', compact('tenagaKerja'));
    }

    // Update tenaga kerja
    public function update(Request $request, $id)
    {
        $tenagaKerja = TenagaKerja::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($tenagaKerja->photo) {
                Storage::disk('public')->delete($tenagaKerja->photo);
            }
            $tenagaKerja->photo = $request->file('photo')->store('tenagakerja', 'public');
        }

        $tenagaKerja->name       = $request->name;
        $tenagaKerja->profession = $request->profession;
        $tenagaKerja->is_active  = $request->has('is_active') ? 1 : 0;
        $tenagaKerja->save();

        return redirect()->route('tenaga-kerja.index')->with('success', 'Tenaga Kerja berhasil diupdate');
    }

    // Hapus tenaga kerja
    public function destroy($id)
    {
        $tenagaKerja = TenagaKerja::findOrFail($id);

        if ($tenagaKerja->photo) {
            Storage::disk('public')->delete($tenagaKerja->photo);
        }

        $tenagaKerja->delete();

        return redirect()->route('tenaga-kerja.index')->with('success', 'Tenaga Kerja berhasil dihapus');
    }

    // Toggle aktif/inaktif tenaga kerja
    public function toggleActive($id)
    {
        $tenagaKerja = TenagaKerja::findOrFail($id);
        $tenagaKerja->is_active = !$tenagaKerja->is_active;
        $tenagaKerja->save();

        return redirect()->route('tenaga-kerja.index')->with('success', 'Status Tenaga Kerja berhasil diubah');
    }

    // Tampilkan detail tenaga kerja
    public function show($id)
    {
        $tenagaKerja = TenagaKerja::findOrFail($id);
        return view('page.backend.tenagakerja.show', compact('tenagaKerja'));
    }
}
