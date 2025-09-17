@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Galeri</h1>
</div>

<!-- Tombol Tambah -->
<div class="mb-4 text-end">
    <a href="{{ route('galeri.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-2"></i>Tambah Galeri
    </a>
</div>

<!-- Gallery Grid -->
<div class="row">
    @forelse($galeris as $galeri)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card bg-dark text-white shadow-sm border-0 h-100">
                <img src="{{ asset('storage/' . $galeri->image) }}" 
                     class="card-img-top" 
                     alt="{{ $galeri->title }}" 
                     style="object-fit: cover; height: 200px; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">

                <div class="card-body text-center">
                    <h6 class="fw-bold mb-3">{{ $galeri->title }}</h6>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="{{ route('galeri.edit', $galeri) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('galeri.destroy', $galeri) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>

                        <a href="{{ route('galeri.show', $galeri) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center text-muted">Belum ada galeri untuk ditampilkan.</p>
        </div>
    @endforelse
</div>
@endsection
