@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Detail Social Media</h1>
</div>

<div class="row justify-content-start">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <!-- Title + Description -->
            <div class="text-center mb-5">
                <h2 class="fw-bold fs-3">{{ $social->title }}</h2>
                <p class="text-muted mb-0">{{ $social->description }}</p>
            </div>

            <!-- Twitter -->
            <div class="mb-4">
                <h5 class="fw-bold">Twitter</h5>
                <div class="bg-dark rounded p-3 d-flex align-items-center gap-3">
                    @if($social->twitter_image)
                        <img src="{{ asset('storage/'.$social->twitter_image) }}" 
                             alt="Twitter" class="rounded" width="60">
                    @endif
                    <span class="fs-6">{{ $social->twitter ?? '-' }}</span>
                </div>
            </div>

            <!-- Facebook -->
            <div class="mb-4">
                <h5 class="fw-bold">Facebook</h5>
                <div class="bg-dark rounded p-3 d-flex align-items-center gap-3">
                    @if($social->facebook_image)
                        <img src="{{ asset('storage/'.$social->facebook_image) }}" 
                             alt="Facebook" class="rounded" width="60">
                    @endif
                    <span class="fs-6">{{ $social->facebook ?? '-' }}</span>
                </div>
            </div>

            <!-- LinkedIn -->
            <div class="mb-4">
                <h5 class="fw-bold">LinkedIn</h5>
                <div class="bg-dark rounded p-3 d-flex align-items-center gap-3">
                    @if($social->linkedin_image)
                        <img src="{{ asset('storage/'.$social->linkedin_image) }}" 
                             alt="LinkedIn" class="rounded" width="60">
                    @endif
                    <span class="fs-6">{{ $social->linkedin ?? '-' }}</span>
                </div>
            </div>

            <!-- Instagram -->
            <div class="mb-4">
                <h5 class="fw-bold">Instagram</h5>
                <div class="bg-dark rounded p-3 d-flex align-items-center gap-3">
                    @if($social->instagram_image)
                        <img src="{{ asset('storage/'.$social->instagram_image) }}" 
                             alt="Instagram" class="rounded" width="60">
                    @endif
                    <span class="fs-6">{{ $social->instagram ?? '-' }}</span>
                </div>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <span class="fs-6">
                        {{ $social->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
