@extends('layouts.backend.app')

@section('content')
<div class="container">
    <!-- Header Halaman -->
    <div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
        <h1 class="text-white fw-bold mb-0">Detail Pesan</h1>
    </div>

    <!-- Card Pesan -->
    <div class="card shadow-sm border-0">
        <div class="card-body bg-dark text-white p-5">
            <div class="mb-3">
                <h5 class="fw-bold">Nama:</h5>
                <p class="mb-0">{{ $message->name }}</p>
            </div>
            <div class="mb-3">
                <h5 class="fw-bold">Email:</h5>
                <p class="mb-0">{{ $message->email }}</p>
            </div>
            <div class="mb-3">
                <h5 class="fw-bold">Subject:</h5>
                <p class="mb-0">{{ $message->subject }}</p>
            </div>
            <hr class="border-light my-4">
            <div class="mb-3">
                <h5 class="fw-bold">Pesan:</h5>
                <p>{{ $message->message }}</p>
            </div>

            <a href="{{ route('messages.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
