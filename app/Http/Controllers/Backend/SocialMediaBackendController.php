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

            'twitter_url' => 'nullable|url',
            'twitter_username' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'facebook_url' => 'nullable|url',
            'facebook_username' => 'nullable|string|max:255',
            'facebook_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'linkedin_url' => 'nullable|url',
            'linkedin_username' => 'nullable|string|max:255',
            'linkedin_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'instagram_url' => 'nullable|url',
            'instagram_username' => 'nullable|string|max:255',
            'instagram_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ]);

        // Upload images
        foreach (['twitter','facebook','linkedin','instagram'] as $platform) {
            $imageField = $platform.'_image';
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('socialmedia', 'public');
            }
        }

        $data['is_active'] = $request->has('is_active');

        SocialMedia::create($data);

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil ditambahkan.');
    }

    public function edit(SocialMedia $socialmedia)
    {
        return view('page.backend.socialmedia.edit', ['social' => $socialmedia]);
    }

    public function update(Request $request, SocialMedia $socialmedia)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',

            'twitter_url' => 'nullable|url',
            'twitter_username' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'facebook_url' => 'nullable|url',
            'facebook_username' => 'nullable|string|max:255',
            'facebook_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'linkedin_url' => 'nullable|url',
            'linkedin_username' => 'nullable|string|max:255',
            'linkedin_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'instagram_url' => 'nullable|url',
            'instagram_username' => 'nullable|string|max:255',
            'instagram_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ]);

        // Upload & replace images
        foreach (['twitter','facebook','linkedin','instagram'] as $platform) {
            $imageField = $platform.'_image';
            if ($request->hasFile($imageField)) {
                if ($socialmedia->$imageField && Storage::disk('public')->exists($socialmedia->$imageField)) {
                    Storage::disk('public')->delete($socialmedia->$imageField);
                }
                $data[$imageField] = $request->file($imageField)->store('socialmedia', 'public');
            }
        }

        $data['is_active'] = $request->has('is_active');

        $socialmedia->update($data);

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil diupdate.');
    }

    public function show(SocialMedia $socialmedia)
    {
        return view('page.backend.socialmedia.show', ['social' => $socialmedia]);
    }

    public function destroy(SocialMedia $socialmedia)
    {
        foreach (['twitter','facebook','linkedin','instagram'] as $platform) {
            $imageField = $platform.'_image';
            if ($socialmedia->$imageField && Storage::disk('public')->exists($socialmedia->$imageField)) {
                Storage::disk('public')->delete($socialmedia->$imageField);
            }
        }

        $socialmedia->delete();

        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil dihapus.');
    }

    public function toggleActive(SocialMedia $socialmedia)
    {
        $socialmedia->is_active = !$socialmedia->is_active;
        $socialmedia->save();

        return redirect()->route('socialmedia.index')->with('success', 'Status Social Media berhasil diubah.');
    }
}
