@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Detail Sejarah</h1>
</div>

<div class="row justify-content-start">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <!-- Foto & Judul -->
            <div class="text-center mb-5">
                @if($sejarah->photo)
                    <img src="{{ asset('storage/'.$sejarah->photo) }}" 
                         alt="{{ $sejarah->title }}" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @else
                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                         alt="Default" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @endif
                <h2 class="fw-bold fs-3">{{ $sejarah->title }}</h2>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <h5 class="fw-bold">Deskripsi</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6" style="white-space: pre-wrap;">{{ $sejarah->description }}</p>
                </div>
            </div>

            <!-- Status Active -->
            <div class="mb-3">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">
                        {{ $sejarah->is_active ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('sejarah.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
