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

<!-- Catatan Admin -->
<div class="bg-secondary rounded-3 p-4 text-white shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 fw-bold">Catatan Admin</h5>
        <a href="{{ route('dashboard.createAdminNote') }}" class="btn btn-success btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr class="text-white text-center">
                    <th style="width:5%">No</th>
                    <th class="text-start">Catatan</th>
                    <th style="width:15%">Tanggal</th>
                    <th style="width:20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($adminNotes as $index => $note)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-start">{{ $note->note }}</td>
                        <td class="text-center">{{ $note->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.editAdminNote', $note->id) }}" 
                               class="btn btn-sm btn-primary me-2">
                               <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.destroyAdminNote', $note->id) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus catatan ini?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada catatan admin.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
