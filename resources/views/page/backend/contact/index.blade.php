@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Contact</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Contact</h5>
                <a href="{{ route('contact.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 20%;">Title</th>
                            <th>Description</th>
                            <th style="width: 25%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td class="text-center">{{ $contact->id }}</td>
                            <td class="fw-semibold">{{ $contact->title }}</td>
                            <td class="text-muted">{{ $contact->description }}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <!-- Tombol Aksi -->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($contacts->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data contact.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
