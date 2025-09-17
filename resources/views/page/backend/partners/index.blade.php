@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Partners</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Partners</h5>
                <a href="{{ route('partners.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 text-center">
                    <thead>
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:15%;">Photo</th>
                            <th style="width:20%;">Partner Name</th>
                            <th>Description</th>
                            <th style="width:25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partners as $partner)
                        <tr>
                            <td>{{ $partner->id }}</td>
                            <td>
                                @if($partner->photo)
                                    <img src="{{ asset('storage/' . $partner->photo) }}" 
                                         class="rounded-circle mx-auto border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;"
                                         alt="{{ $partner->name }}">
                                @else
                                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                                         class="rounded-circle mx-auto border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;"
                                         alt="Default">
                                @endif
                            </td>
                            <td class="fw-semibold text-start">{{ $partner->name }}</td>
                            <td class="text-start">{{ $partner->description }}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data Partners
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
