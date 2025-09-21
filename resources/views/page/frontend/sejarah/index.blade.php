@extends('layouts.frontend.app')
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        @if($sejarah)
        <h1 class="text-center mb-3" style="color: rgb(17, 0, 255);">{{ $sejarah->title }}</h1>
        <p class="text-center mb-5" style="color: rgb(17, 0, 255);">Home / Sejarah</p>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn text-center" data-wow-delay="0.2s">
                @if($sejarah->photo)
                    <img class="img-fluid mb-3" src="{{ asset('storage/' . $sejarah->photo) }}" alt="{{ $sejarah->title }}">
                @endif
            </div>

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="font-dancing-script text-primary mb-3">{{ $sejarah->title }}</h1>
                <p class="mb-4">{!! nl2br(e($sejarah->description)) !!}</p>
            </div>
        </div>
        @else
            <p class="text-center text-muted">Sejarah belum tersedia.</p>
        @endif
    </div>
</div>
@endsection
