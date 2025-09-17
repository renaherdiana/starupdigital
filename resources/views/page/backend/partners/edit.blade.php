@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Partner</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Photo Centered -->
                @if($partner->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$partner->photo) }}" 
                             alt="{{ $partner->name }}" 
                             style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="form-control bg-dark text-white mb-4">

                <!-- Nama Partner -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Partner</label>
                    <input type="text" name="name" id="name" class="form-control bg-dark text-white" 
                           value="{{ old('name', $partner->name) }}" placeholder="Masukkan nama partner" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan deskripsi partner" required>{{ old('description', $partner->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                           {{ old('is_active', $partner->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('partners.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
