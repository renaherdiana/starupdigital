@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Tambah Catatan Admin</h1>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Form Tambah Catatan Admin -->
            <form action="{{ route('dashboard.storeAdminNote') }}" method="POST">
                @csrf

                <!-- Input Catatan -->
                <div class="mb-3">
                    <label for="note" class="form-label fw-semibold">Catatan</label>
                    <textarea name="note" id="note" rows="5" class="form-control bg-dark text-white" placeholder="Masukkan catatan" required>{{ old('note') }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
