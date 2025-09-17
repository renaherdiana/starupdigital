@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Sejarah</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('sejarah.update', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Foto Centered -->
                @if($sejarah->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$sejarah->photo) }}" 
                             alt="{{ $sejarah->title }}" 
                             style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="form-control bg-dark text-white mb-4">

                <!-- Judul -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" 
                           value="{{ old('title', $sejarah->title) }}" placeholder="Masukkan judul" required>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan deskripsi" required>{{ old('description', $sejarah->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                           {{ old('is_active', $sejarah->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('sejarah.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
