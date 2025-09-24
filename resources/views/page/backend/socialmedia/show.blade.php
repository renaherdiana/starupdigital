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

            <!-- Loop Social Platforms -->
            @foreach (['twitter','facebook','linkedin','instagram'] as $platform)
                @php
                    $usernameField = $platform . '_username';
                    $imageField = $platform . '_image';
                    $urlField = $platform . '_url';

                    $username = $social->$usernameField;
                    $image = $social->$imageField 
                        ? asset('storage/'.$social->$imageField) 
                        : asset('img/' . $platform . '.png');

                    // Gunakan URL dari database jika ada, fallback ke username
                    $url = $social->$urlField ?? match($platform) {
                        'twitter' => $username ? 'https://twitter.com/'.ltrim($username,'@') : null,
                        'facebook' => $username ? 'https://facebook.com/'.$username : null,
                        'linkedin' => $username ? 'https://linkedin.com/in/'.$username : null,
                        'instagram' => $username ? 'https://instagram.com/'.ltrim($username,'@') : null,
                        default => null
                    };
                @endphp

                @if($username)
                    <div class="mb-4">
                        <h5 class="fw-bold">{{ ucfirst($platform) }}</h5>
                        <div class="bg-dark rounded p-3 d-flex align-items-center gap-3">
                            @if($image)
                                <img src="{{ $image }}" 
                                     alt="{{ ucfirst($platform) }}" 
                                     class="rounded-circle shadow-sm" 
                                     width="60" height="60" 
                                     style="object-fit: cover;">
                            @endif
                            <div class="d-flex flex-column">
                                <span class="fw-semibold text-white">{{ ucfirst($platform) }}</span>
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-white-50">
                                    {{ $username }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Status -->
            <div class="mb-4">
                <h5 class="fw-bold">Status</h5>
                <div class="bg-dark rounded p-3">
                    <span class="fs-6">{{ $social->is_active ? 'Active' : 'Inactive' }}</span>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-5">
                <a href="{{ route('socialmedia.index') }}" class="btn btn-danger px-5 py-2 fw-bold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
