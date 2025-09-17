@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Sejarah</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Sejarah</h5>
                <a href="{{ route('sejarah.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:15%;">Foto</th>
                            <th style="width:20%;">Judul</th>
                            <th>Deskripsi</th>
                            <th style="width:25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sejarahs as $sejarah)
                        <tr>
                            <td class="text-center">{{ $sejarah->id }}</td>

                            <!-- Foto -->
                            <td class="text-center">
                                @if($sejarah->photo)
                                    <img src="{{ asset('storage/' . $sejarah->photo) }}" 
                                         class="rounded-circle border border-2 border-dark" 
                                         style="width:60px;height:60px;object-fit:cover;" 
                                         alt="{{ $sejarah->title }}">
                                @else
                                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                                         class="rounded-circle border border-2 border-dark" 
                                         style="width:60px;height:60px;object-fit:cover;" 
                                         alt="Default">
                                @endif
                            </td>

                            <td class="fw-semibold text-start">{{ $sejarah->title }}</td>
                            <td class="text-start text-muted">{{ Str::limit($sejarah->description, 60) }}</td>

                            <!-- Actions -->
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <!-- Edit -->
                                        <a href="{{ route('sejarah.edit', $sejarah->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <!-- Delete -->
                                        <form action="{{ route('sejarah.destroy', $sejarah->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                        <!-- Detail -->
                                        <a href="{{ route('sejarah.show', $sejarah->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($sejarahs->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data Sejarah
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
