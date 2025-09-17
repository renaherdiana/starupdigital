@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Detail About</h1>
</div>

<div class="row justify-content-start">
    <!-- Kolom Detail Lebih Besar -->
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <!-- Foto & Judul -->
            <div class="text-center mb-5">
                @if($about->photo)
                    <img src="{{ asset('storage/'.$about->photo) }}" 
                         alt="{{ $about->title }}" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @else
                    <img src="{{ asset('assetsbackend/img/index.jpg') }}" 
                         alt="Default" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @endif
                <h2 class="fw-bold fs-3">{{ $about->title }}</h2>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <h5 class="fw-bold">Description</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">{{ $about->description }}</p>
                </div>
            </div>

            <!-- Years Experience -->
            <div class="mb-3">
                <h5 class="fw-bold">Years Experience</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">{{ $about->experience ?? '-' }}</p>
                </div>
            </div>

            <!-- Happy Customers -->
            <div class="mb-3">
                <h5 class="fw-bold">Happy Customers</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">{{ $about->customers ?? '-' }}</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <h5 class="fw-bold">No. Telephone</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">{{ $about->phone ?? '-' }}</p>
                </div>
            </div>

            <!-- Status Active -->
            <div class="mb-3">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">
                        {{ $about->is_active ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('about.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
