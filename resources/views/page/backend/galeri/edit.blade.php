@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Galeri</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Photo Centered -->
                @if($galeri->image)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$galeri->image) }}" 
                             alt="Current Photo" 
                             style="width:200px; height:200px; object-fit:cover; border-radius:.5rem;">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control bg-dark text-white mb-4">

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" 
                           value="{{ old('title', $galeri->title) }}" placeholder="Masukkan judul">
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="active" class="form-check-input" id="active" value="1" 
                        {{ old('active', $galeri->active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="active">Active</label>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('galeri.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
