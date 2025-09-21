@extends('layouts.backend.app')

@section('content')
<!-- Header Dashboard -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Dashboard</h1>
</div>

<!-- Alert -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Info Cards -->
<div class="container-fluid">
    <div class="row justify-content-center g-4 mb-4">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="bg-secondary text-center rounded-3 p-4 text-white shadow-sm h-100">
                <i class="bi bi-bar-chart-line-fill fs-2 mb-3"></i>
                <div class="fw-bold mb-1">Total Services</div>
                <div class="fs-4">{{ $totalServices ?? 0 }}</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="bg-secondary text-center rounded-3 p-4 text-white shadow-sm h-100">
                <i class="bi bi-people-fill fs-2 mb-3"></i>
                <div class="fw-bold mb-1">Total Partners</div>
                <div class="fs-4">{{ $totalPartners ?? 0 }}</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="bg-secondary text-center rounded-3 p-4 text-white shadow-sm h-100">
                <i class="bi bi-person-badge-fill fs-2 mb-3"></i>
                <div class="fw-bold mb-1">Total Tenaga Kerja</div>
                <div class="fs-4">{{ $totalTenagaKerja ?? 0 }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<div class="bg-secondary rounded-3 p-4 text-white shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 fw-bold">Hero</h5>
        <a href="{{ route('dashboard.createHero') }}" class="btn btn-success btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Hero
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr class="text-center text-white">
                    <th style="width:5%">No</th>
                    <th style="width:15%">Foto</th>
                    <th>Judul</th>
                    <th style="width:20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($heros as $index => $hero)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">
                            @if($hero->image)
                                <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}" class="rounded-circle" style="width:60px;height:60px;object-fit:cover;">
                            @else
                                <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" class="rounded-circle" style="width:60px;height:60px;object-fit:cover;">
                            @endif
                        </td>
                        <td class="text-start">{{ $hero->title }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('dashboard.editHero', $hero->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('dashboard.destroyHero', $hero->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('dashboard.showHero', $hero->id) }}" class="btn btn-sm btn-info">Detail</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada Hero.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
