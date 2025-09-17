@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Media Sosial</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Media Sosial</h5>
                <a href="{{ route('socialmedia.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 45%;">Description</th>
                            <th style="width: 20%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($socials as $social)
                        <tr>
                            <td class="text-center">{{ $social->id }}</td>
                            <td class="fw-semibold">{{ $social->title }}</td>
                            <td>{{ Str::limit($social->description, 50) }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('socialmedia.edit', $social->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('socialmedia.show', $social->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <form action="{{ route('socialmedia.destroy', $social->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data media sosial.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
