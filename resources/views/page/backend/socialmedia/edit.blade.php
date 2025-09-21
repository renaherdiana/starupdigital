@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Social Media</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('socialmedia.update', $social) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title" 
                           class="form-control bg-dark text-white" 
                           value="{{ old('title', $social->title) }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" required>{{ old('description', $social->description) }}</textarea>
                </div>

                <!-- Social Platforms -->
                @foreach (['twitter', 'facebook', 'linkedin', 'instagram'] as $platform)
                    <div class="mb-3">
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

                        @if($social->{$platform.'_image'})
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$social->{$platform.'_image'}) }}" 
                                     alt="{{ ucfirst($platform) }} Logo" class="img-thumbnail" width="120">
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" 
                           id="is_active" value="1" 
                           {{ old('is_active', $social->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
