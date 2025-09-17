@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman About</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header Table -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data About</h5>
                <a href="{{ route('about.create') }}" class="btn btn-success btn-sm px-3">
                    <i class="bi bi-plus-lg me-2"></i>Tambah
                </a>
            </div>


            <!-- Table About -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 15%;">Photo</th>
                            <th style="width: 20%;">Title</th>
                            <th>Description</th>
                            <th style="width: 25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $about)
                        <tr>
                            <td class="text-center">{{ $about->id }}</td>
                            <td>
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center mx-auto" 
                                    style="width:60px;height:60px; overflow:hidden;">
                                    @if($about->photo)
                                        <img src="{{ asset('storage/'.$about->photo) }}" 
                                            alt="User" 
                                            class="w-100 h-100" 
                                            style="object-fit:cover;">
                                    @else
                                        <img src="{{ asset('assetsbackend/img/index.jpg') }}" 
                                            alt="Default" 
                                            class="w-100 h-100" 
                                            style="object-fit:cover;">
                                    @endif
                                </div>
                            </td>
                            <td class="fw-semibold text-start">{{ $about->title }}</td>
                            <td class="text-start text-muted">{{ $about->description }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <!-- Tombol aksi -->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('about.show', $about->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($abouts->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data About</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
