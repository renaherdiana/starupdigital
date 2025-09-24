@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Social Media</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('socialmedia.update', $social->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title"
                           class="form-control bg-dark text-white"
                           value="{{ old('title', $social->title) }}" required>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="form-control bg-dark text-white" required>{{ old('description', $social->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Social Platforms -->
                @foreach (['twitter', 'facebook', 'linkedin', 'instagram'] as $platform)
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-3">{{ ucfirst($platform) }}</h5>

                        <label class="form-label fw-semibold">{{ ucfirst($platform) }} URL</label>
                        <input type="url" name="{{ $platform }}_url"
                               class="form-control bg-dark text-white mb-2"
                               placeholder="https://example.com"
                               value="{{ old($platform.'_url', $social->{$platform.'_url'}) }}">

                        <label class="form-label fw-semibold">{{ ucfirst($platform) }} Username</label>
                        <input type="text" name="{{ $platform }}_username"
                               class="form-control bg-dark text-white mb-2"
                               placeholder="Masukkan username {{ ucfirst($platform) }}"
                               value="{{ old($platform.'_username', $social->{$platform.'_username'}) }}">

                        <label class="form-label fw-semibold">{{ ucfirst($platform) }} Image</label>
                        <input type="file" name="{{ $platform }}_image"
                               class="form-control bg-dark text-white" accept="image/*">

                        <!-- Image Preview -->
                        @if($social->{$platform.'_image'})
                            <div class="mt-3">
                                <img src="{{ asset('storage/'.$social->{$platform.'_image'}) }}"
                                     alt="{{ ucfirst($platform) }} Logo"
                                     class="rounded-circle shadow-sm"
                                     width="120" height="120"
                                     style="object-fit: cover;">
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1"
                           {{ old('is_active', $social->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
