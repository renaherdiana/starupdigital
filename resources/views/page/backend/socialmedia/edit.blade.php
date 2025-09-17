@extends('layouts.backend.app')

@section('content')
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
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" required>{{ old('description', $social->description) }}</textarea>
                </div>

                <!-- Twitter -->
                <div class="mb-3">
                    <label for="twitter" class="form-label fw-semibold">Twitter Link</label>
                    <input type="text" name="twitter" id="twitter" 
                           class="form-control bg-dark text-white" 
                           value="{{ old('twitter', $social->twitter) }}">
                </div>
                <div class="mb-3">
                    <label for="twitter_image" class="form-label fw-semibold">Twitter Image</label>
                    <input type="file" name="twitter_image" id="twitter_image" class="form-control bg-dark text-white">
                    @if($social->twitter_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$social->twitter_image) }}" alt="Twitter Logo" class="img-thumbnail" width="120">
                        </div>
                    @endif
                </div>

                <!-- Facebook -->
                <div class="mb-3">
                    <label for="facebook" class="form-label fw-semibold">Facebook Link</label>
                    <input type="text" name="facebook" id="facebook" 
                           class="form-control bg-dark text-white" 
                           value="{{ old('facebook', $social->facebook) }}">
                </div>
                <div class="mb-3">
                    <label for="facebook_image" class="form-label fw-semibold">Facebook Image</label>
                    <input type="file" name="facebook_image" id="facebook_image" class="form-control bg-dark text-white">
                    @if($social->facebook_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$social->facebook_image) }}" alt="Facebook Logo" class="img-thumbnail" width="120">
                        </div>
                    @endif
                </div>

                <!-- LinkedIn -->
                <div class="mb-3">
                    <label for="linkedin" class="form-label fw-semibold">LinkedIn Link</label>
                    <input type="text" name="linkedin" id="linkedin" 
                           class="form-control bg-dark text-white" 
                           value="{{ old('linkedin', $social->linkedin) }}">
                </div>
                <div class="mb-3">
                    <label for="linkedin_image" class="form-label fw-semibold">LinkedIn Image</label>
                    <input type="file" name="linkedin_image" id="linkedin_image" class="form-control bg-dark text-white">
                    @if($social->linkedin_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$social->linkedin_image) }}" alt="LinkedIn Logo" class="img-thumbnail" width="120">
                        </div>
                    @endif
                </div>

                <!-- Instagram -->
                <div class="mb-3">
                    <label for="instagram" class="form-label fw-semibold">Instagram Link</label>
                    <input type="text" name="instagram" id="instagram" 
                           class="form-control bg-dark text-white" 
                           value="{{ old('instagram', $social->instagram) }}">
                </div>
                <div class="mb-3">
                    <label for="instagram_image" class="form-label fw-semibold">Instagram Image</label>
                    <input type="file" name="instagram_image" id="instagram_image" class="form-control bg-dark text-white">
                    @if($social->instagram_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$social->instagram_image) }}" alt="Instagram Logo" class="img-thumbnail" width="120">
                        </div>
                    @endif
                </div>

                <!-- Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" 
                           id="is_active" value="1" 
                           {{ old('is_active', $social->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
