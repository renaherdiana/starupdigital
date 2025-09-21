@extends('layouts.frontend.app')
@section('content')
<div class="container-fluid overflow-hidden py-5 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.2s">
            <h1 style="color: rgb(0, 17, 255);">Tenaga Kerja</h1>
            <p style="color:rgb(0, 17, 255);">Home / Tenaga Kerja</p>
            <h1 class="mb-5">Our Experienced Specialists</h1>
        </div>

        @if($team && $team->count())
        <div class="row g-4 team center justify-content-center">
            @foreach($team as $index => $t)
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="{{ 0.1 * ($index % 4) }}s">
                <div class="team-item position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{ $t->photo ? asset('storage/' . $t->photo) : asset('img/default.png') }}" alt="{{ $t->name }}">
                    <div class="team-overlay">
                        <p class="text-primary mb-1">{{ $t->profession }}</p>
                        <h4>{{ $t->name }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-muted">Tenaga kerja belum tersedia.</p>
        @endif
    </div>
</div>
@endsection
