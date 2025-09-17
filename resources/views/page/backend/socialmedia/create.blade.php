@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Social Media</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('socialmedia.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title" 
                           class="form-control bg-dark text-white" 
                           placeholder="Masukkan title" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan description" required></textarea>
                </div>

                <!-- Twitter -->
                <div class="mb-3">
                    <label for="twitter" class="form-label fw-semibold">Twitter</label>
                    <input type="text" name="twitter" id="twitter" 
                           class="form-control bg-dark text-white mb-2" 
                           placeholder="Link Twitter">
                    <input type="file" name="twitter_image" id="twitter_image" 
                           class="form-control bg-dark text-white">
                </div>

                <!-- Facebook -->
                <div class="mb-3">
                    <label for="facebook" class="form-label fw-semibold">Facebook</label>
                    <input type="text" name="facebook" id="facebook" 
                           class="form-control bg-dark text-white mb-2" 
                           placeholder="Link Facebook">
                    <input type="file" name="facebook_image" id="facebook_image" 
                           class="form-control bg-dark text-white">
                </div>

                <!-- LinkedIn -->
                <div class="mb-3">
                    <label for="linkedin" class="form-label fw-semibold">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" 
                           class="form-control bg-dark text-white mb-2" 
                           placeholder="Link LinkedIn">
                    <input type="file" name="linkedin_image" id="linkedin_image" 
                           class="form-control bg-dark text-white">
                </div>

                <!-- Instagram -->
                <div class="mb-3">
                    <label for="instagram" class="form-label fw-semibold">Instagram</label>
                    <input type="text" name="instagram" id="instagram" 
                           class="form-control bg-dark text-white mb-2" 
                           placeholder="Link Instagram">
                    <input type="file" name="instagram_image" id="instagram_image" 
                           class="form-control bg-dark text-white">
                </div>

                <!-- Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
