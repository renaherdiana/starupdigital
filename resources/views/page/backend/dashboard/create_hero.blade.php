@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Hero</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Form Tambah Hero -->
            <form action="{{ route('dashboard.storeHero') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control bg-dark text-white">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Title (multi-line) -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <textarea name="title" id="title" rows="3" class="form-control bg-dark text-white" 
                        placeholder="Masukkan judul" required>{{ old('title') }}</textarea>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Subtitle (multi-line) -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                    <textarea name="subtitle" id="subtitle" rows="2" class="form-control bg-dark text-white" 
                        placeholder="Masukkan subtitle">{{ old('subtitle') }}</textarea>
                    @error('subtitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Is Active -->
                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">Active</label>
                    @error('is_active')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
