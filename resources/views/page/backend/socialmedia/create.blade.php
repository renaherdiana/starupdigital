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
                           placeholder="Masukkan title" 
                           value="{{ old('title') }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan description" required>{{ old('description') }}</textarea>
                </div>

                <!-- Social Platforms -->
                @foreach (['twitter', 'facebook', 'linkedin', 'instagram'] as $platform)
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ ucfirst($platform) }}</label>

                        <!-- URL -->
                        <input type="url" name="{{ $platform }}_url" 
                            class="form-control bg-dark text-white mb-2" 
                            placeholder="Masukkan link {{ ucfirst($platform) }}" 
                            value="{{ old($platform.'_url') }}">

                        <!-- Username -->
                        <input type="text" name="{{ $platform }}_username" 
                            class="form-control bg-dark text-white mb-2" 
                            placeholder="Masukkan username {{ ucfirst($platform) }}" 
                            value="{{ old($platform.'_username') }}">

                        <!-- Image -->
                        <input type="file" name="{{ $platform }}_image" 
                            class="form-control bg-dark text-white" 
                            accept="image/*">
                    </div>
                @endforeach

                <!-- Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1"
                           {{ old('is_active', $social->is_active ?? true) ? 'checked' : '' }}>
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
