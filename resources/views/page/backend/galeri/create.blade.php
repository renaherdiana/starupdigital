@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Galeri</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Form Tambah Galeri -->
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input Image -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control bg-dark text-white" required>
                </div>

                <!-- Input Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Galeri</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" placeholder="Masukkan judul galeri" required>
                </div>

                <!-- Input Active -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="active" class="form-check-input" id="active" value="1">
                    <label class="form-check-label fw-semibold" for="active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('galeri.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
