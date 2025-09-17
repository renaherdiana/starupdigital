@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Contact</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" 
                           value="{{ old('title', $contact->title) }}" placeholder="Masukkan title" required>
                </div>

                <!-- Subtitle -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control bg-dark text-white" 
                           value="{{ old('subtitle', $contact->subtitle) }}" placeholder="Masukkan subtitle">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan description" required>{{ old('description', $contact->description) }}</textarea>
                </div>


                <!-- Active Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                        {{ old('is_active', $contact->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('contact.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
