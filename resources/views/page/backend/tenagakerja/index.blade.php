@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Tenaga Kerja</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Tenaga Kerja</h5>
                <a href="{{ route('tenaga-kerja.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 text-center">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:15%;">Photo</th>
                            <th style="width:20%;">Nama</th>
                            <th style="width:25%;">Profesi</th>
                            <th style="width:35%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tenagakerjas as $tk)
                        <tr>
                            <td>{{ $tk->id }}</td>
                            <td>
                                @if($tk->photo)
                                    <img src="{{ asset('storage/' . $tk->photo) }}"
                                         class="rounded-circle mx-auto border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;"
                                         alt="{{ $tk->name }}">
                                @else
                                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}"
                                         class="rounded-circle mx-auto border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;"
                                         alt="Default">
                                @endif
                            </td>
                            <td class="fw-semibold text-start">{{ $tk->name }}</td>
                            <td class="text-start">{{ $tk->profession }}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="{{ route('tenaga-kerja.edit', $tk->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('tenaga-kerja.destroy', $tk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ route('tenaga-kerja.show', $tk->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data Tenaga Kerja
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
