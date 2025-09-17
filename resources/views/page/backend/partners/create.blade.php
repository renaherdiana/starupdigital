@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Partner</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Form Tambah Partner -->
            <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Foto -->
                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Foto</label>
                    <input type="file" name="photo" id="photo" class="form-control bg-dark text-white">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nama Partner -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Partner</label>
                    <input type="text" name="name" id="name" class="form-control bg-dark text-white" 
                        placeholder="Masukkan nama partner" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="form-control bg-dark text-white" 
                        placeholder="Masukkan deskripsi partner" required>{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Checkbox Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                        {{ old('is_active', 1) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('partners.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
