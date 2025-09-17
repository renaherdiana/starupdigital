@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Service</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Service Name -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Service Name</label>
                    <input type="text" name="title" class="form-control bg-dark text-white" 
                           value="{{ old('title', $service->title) }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" rows="4" class="form-control bg-dark text-white">{{ old('description', $service->description) }}</textarea>
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                           {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi di Kanan -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('services.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
