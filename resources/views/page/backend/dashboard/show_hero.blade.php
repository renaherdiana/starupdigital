@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Detail Hero</h1>
</div>

<div class="row justify-content-start">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <!-- Image & Title -->
            <div class="text-center mb-5">
                @if($hero->image)
                    <img src="{{ asset('storage/'.$hero->image) }}" 
                         alt="{{ $hero->title }}" 
                         class="mb-3 shadow"
                         style="width:200px; height:200px; object-fit:cover; border-radius:8px;">
                @else
                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                         alt="Default" 
                         class="mb-3 shadow"
                         style="width:200px; height:200px; object-fit:cover; border-radius:8px;">
                @endif
                <h2 class="fw-bold fs-3">{{ $hero->title }}</h2>
                @if($hero->subtitle)
                    <p class="fs-5 text-muted">{{ $hero->subtitle }}</p>
                @endif
            </div>

            <!-- Description -->
            

            <!-- Status Active -->
            <div class="mb-3">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">
                        {{ $hero->is_active ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
