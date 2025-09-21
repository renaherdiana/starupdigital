@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Detail Testimonial</h1>
</div>

<div class="row justify-content-start">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-5 text-white">

            <!-- Foto & Nama -->
            <div class="text-center mb-5">
                @if($testimonial->photo)
                    <img src="{{ asset('storage/'.$testimonial->photo) }}" 
                         alt="{{ $testimonial->name }}" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @else
                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                         alt="Default" 
                         class="rounded-circle mb-3 shadow"
                         style="width:180px; height:180px; object-fit:cover;">
                @endif
                <h2 class="fw-bold fs-3">{{ $testimonial->name }}</h2>

                <!-- Rating -->
                <div class="mt-2">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                        @else
                            <i class="bi bi-star text-warning fs-5"></i>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Testimoni -->
            <div class="mb-4">
                <h5 class="fw-bold">Testimoni</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">{{ $testimonial->testimonial }}</p>
                </div>
            </div>

            <!-- Status Active -->
            <div class="mb-3">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <p class="mb-0 text-white fs-6">
                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('testimonial.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
