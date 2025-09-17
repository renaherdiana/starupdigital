<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Partner;
use App\Models\TenagaKerja;
use App\Models\AdminNote;

class DashboardBackendController extends Controller
{
    public function index() {
        $totalServices = Service::count();
        $totalPartners = Partner::count();
        $totalTenagaKerja = TenagaKerja::count();
        $adminNotes = AdminNote::orderBy('created_at','desc')->get();

        return view('page.backend.dashboard.index', compact(
            'totalServices',
            'totalPartners',
            'totalTenagaKerja',
            'adminNotes'
        ));
    }

    // Form tambah catatan admin
    public function createAdminNote() {
        return view('page.backend.dashboard.create_admin_note');
    }

    // Simpan catatan admin
    public function storeAdminNote(Request $request) {
        $request->validate([
            'note' => 'required|string',
        ]);

        AdminNote::create(['note' => $request->note]);

        return redirect()->route('dashboard.index')->with('success', 'Catatan admin berhasil ditambahkan.');
    }

    public function editAdminNote($id) {
        $note = AdminNote::findOrFail($id);
        return view('page.backend.dashboard.edit_admin_note', compact('note'));
    }

    public function updateAdminNote(Request $request, $id) {
        $request->validate(['note' => 'required|string']);
        $note = AdminNote::findOrFail($id);
        $note->update(['note' => $request->note]);

        return redirect()->route('dashboard.index')->with('success', 'Catatan admin berhasil diupdate.');
    }

    public function destroyAdminNote($id) {
        $note = AdminNote::findOrFail($id);
        $note->delete();

        return redirect()->back()->with('success', 'Catatan admin berhasil dihapus.');
    }
}
