@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Services</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Services</h5>
                <a href="{{ route('services.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:20%;">Service Name</th>
                            <th>Deskripsi</th>
                            <th style="width:25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td class="text-center">{{ $service->id }}</td>
                            <td class="fw-semibold text-start">{{ $service->title }}</td>
                            <td class="text-start text-muted">{{ $service->description }}</td>

                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('services.show', $service) }}" class="btn btn-info btn-sm">Detail</a>

                                        <!-- Delete -->
                                        <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($services->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data Services
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
