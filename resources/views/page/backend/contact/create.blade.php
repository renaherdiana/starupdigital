@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Contact</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">
            
            <!-- Form Tambah Contact -->
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                
                <!-- Input Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" placeholder="Masukkan title" required>
                </div>

                <!-- Input Subtitle -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control bg-dark text-white" placeholder="Masukkan subtitle">
                </div>

                <!-- Input Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control bg-dark text-white" placeholder="Masukkan description" required></textarea>
                </div>

                <!-- Input Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('contact.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
