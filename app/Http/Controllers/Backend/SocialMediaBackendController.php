<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Storage;

class SocialMediaBackendController extends Controller
{
    public function index()
    {
        $socials = SocialMedia::all();
        return view('page.backend.socialmedia.index', compact('socials'));
    }

    public function create()
    {
        return view('page.backend.socialmedia.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'linkedin_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'instagram_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // upload image jika ada
        foreach (['twitter_image','facebook_image','linkedin_image','instagram_image'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('socialmedia', 'public');
            }
        }

        $data['is_active'] = $request->has('is_active');

        SocialMedia::create($data);

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil ditambahkan.');
    }

    public function edit(SocialMedia $social)
    {
        return view('page.backend.socialmedia.edit', compact('social'));
    }

    public function update(Request $request, SocialMedia $social)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'linkedin_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'instagram_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // handle upload gambar baru (replace yg lama)
        foreach (['twitter_image','facebook_image','linkedin_image','instagram_image'] as $field) {
            if ($request->hasFile($field)) {
                // hapus gambar lama jika ada
                if ($social->$field && Storage::disk('public')->exists($social->$field)) {
                    Storage::disk('public')->delete($social->$field);
                }
                $data[$field] = $request->file($field)->store('socialmedia', 'public');
            }
        }

        $data['is_active'] = $request->has('is_active');

        $social->update($data);

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil diupdate.');
    }

    public function show(SocialMedia $social)
    {
        return view('page.backend.socialmedia.show', compact('social'));
    }

    public function destroy(SocialMedia $social)
    {
        // hapus gambar juga
        foreach (['twitter_image','facebook_image','linkedin_image','instagram_image'] as $field) {
            if ($social->$field && Storage::disk('public')->exists($social->$field)) {
                Storage::disk('public')->delete($social->$field);
            }
        }

        $social->delete();

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil dihapus.');
    }
}
