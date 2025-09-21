@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Hero</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('dashboard.updateHero', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Image Preview -->
                @if($hero->image)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$hero->image) }}" 
                             alt="{{ $hero->title }}" 
                             style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control bg-dark text-white mb-4">

                <!-- Title (multi-line) -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <textarea name="title" id="title" rows="3" class="form-control bg-dark text-white" 
                        placeholder="Masukkan judul" required>{{ old('title', $hero->title) }}</textarea>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Subtitle (multi-line) -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                    <textarea name="subtitle" id="subtitle" rows="2" class="form-control bg-dark text-white" 
                        placeholder="Masukkan subtitle">{{ old('subtitle', $hero->subtitle) }}</textarea>
                    @error('subtitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                           {{ old('is_active', $hero->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
