@extends('layouts.backend.app')

@section('content')
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Testimonial</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Testimonial</h5>
                <a href="{{ route('testimonial.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:15%;">Photo</th>
                            <th style="width:20%;">Nama</th>
                            <th>Testimoni</th>
                            <th style="width:10%;">Rating</th> <!-- Rating angka -->
                            <th style="width:25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="text-center">{{ $testimonial->id }}</td>
                            <td class="text-center">
                                @if($testimonial->photo)
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}" 
                                         class="rounded-circle border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;" 
                                         alt="{{ $testimonial->name }}">
                                @else
                                    <img src="{{ asset('assetsbackend/img/default-user.jpg') }}" 
                                         class="rounded-circle border border-2 border-dark"
                                         style="width:60px;height:60px;object-fit:cover;" 
                                         alt="Default">
                                @endif
                            </td>
                            <td class="fw-semibold text-start">{{ $testimonial->name }}</td>
                            <td class="text-start text-muted">{{ $testimonial->testimonial }}</td>

                            <!-- Rating (angka + tooltip bintang) -->
                            <td class="text-center">
                                <span data-bs-toggle="tooltip" data-bs-html="true" 
                                      title="@for($i = 1; $i <= $testimonial->rating; $i++)★@endfor">
                                    {{ $testimonial->rating }}/5
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <!-- Edit -->
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <!-- Delete -->
                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                        <!-- Detail -->
                                        <a href="{{ route('testimonial.show', $testimonial->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data Testimonial
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Inisialisasi Tooltip Bootstrap -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endpush

@endsection
