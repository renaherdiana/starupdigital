@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Service</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">
            
            <!-- Form Tambah Service -->
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input Photo -->
                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control bg-dark text-white">
                </div>

                <!-- Input Service Name -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Service Name</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" placeholder="Masukkan nama service" required>
                </div>

                <!-- Input Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control bg-dark text-white" placeholder="Masukkan deskripsi service"></textarea>
                </div>

                <!-- Checkbox Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('services.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
