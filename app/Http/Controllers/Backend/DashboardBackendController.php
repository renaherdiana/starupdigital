<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Partner;
use App\Models\TenagaKerja;
use App\Models\Hero;

class DashboardBackendController extends Controller
{
    // Tampilkan dashboard dan list hero
    public function index()
    {
        $totalServices    = Service::count();
        $totalPartners    = Partner::count();
        $totalTenagaKerja = TenagaKerja::count();
        $heros            = Hero::orderBy('created_at', 'desc')->get();

        return view('page.backend.dashboard.index', compact(
            'totalServices',
            'totalPartners',
            'totalTenagaKerja',
            'heros'
        ));
    }

    // Form tambah hero
    public function createHero()
    {
        return view('page.backend.dashboard.create_hero');
    }

    // Simpan hero baru
    public function storeHero(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('hero', 'public');
        }

        Hero::create([
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'image'       => $filename,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Hero berhasil ditambahkan');
    }

    // Form edit hero
    public function editHero($id)
    {
        $hero = Hero::find($id);
        if (!$hero) {
            return redirect()->route('dashboard.index')->with('error', 'Hero tidak ditemukan');
        }

        return view('page.backend.dashboard.edit_hero', compact('hero'));
    }

    // Update hero
    public function updateHero(Request $request, $id)
    {
        $hero = Hero::find($id);
        if (!$hero) {
            return redirect()->route('dashboard.index')->with('error', 'Hero tidak ditemukan');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'subtitle', 'description']);

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('hero', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $hero->update($data);

        return redirect()->route('dashboard.index')->with('success', 'Hero berhasil diupdate');
    }

    // Hapus hero
    public function destroyHero($id)
    {
        $hero = Hero::find($id);
        if ($hero) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->delete();
        }

        return redirect()->route('dashboard.index')->with('success', 'Hero berhasil dihapus');
    }

    // Toggle aktif/inaktif hero
    public function toggleHero($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->is_active = !$hero->is_active;
        $hero->save();

        return redirect()->route('dashboard.index')->with('success', 'Status hero berhasil diubah');
    }

    // Tampilkan detail hero
    public function showHero($id)
    {
        $hero = Hero::findOrFail($id);
        return view('page.backend.dashboard.show_hero', compact('hero'));
    }
}
