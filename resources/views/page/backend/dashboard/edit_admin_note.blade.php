@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Catatan Admin</h1>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Form Edit Catatan Admin -->
            <form action="{{ route('dashboard.updateAdminNote', $note->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Catatan -->
                <div class="mb-3">
                    <label for="note" class="form-label fw-semibold">Catatan</label>
                    <textarea name="note" id="note" rows="5" class="form-control bg-dark text-white" required>{{ old('note', $note->note) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
