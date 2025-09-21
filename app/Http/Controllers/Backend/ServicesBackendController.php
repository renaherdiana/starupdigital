<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesBackendController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('page.backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('page.backend.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'is_active' => 'nullable|in:0,1',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('page.backend.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('page.backend.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('photo')) {
            // Hapus photo lama jika ada
            if ($service->photo) {
                Storage::disk('public')->delete($service->photo);
            }
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->photo) {
            Storage::disk('public')->delete($service->photo);
        }
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
