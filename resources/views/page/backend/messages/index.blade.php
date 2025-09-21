@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Halaman Messages</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <!-- Header Table -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Data Pesan Masuk</h5>
            </div>

            <!-- Table Messages -->
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:20%;">Nama</th>
                            <th style="width:20%;">Email</th>
                            <th>Subject</th>
                            <th style="width:25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td class="text-center">{{ $message->id }}</td>
                            <td class="fw-semibold text-start">{{ $message->name }}</td>
                            <td class="text-start text-muted">{{ $message->email }}</td>
                            <td class="text-start">{{ $message->subject }}</td>

                            <!-- Actions -->
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="d-flex gap-2 mb-2">
                                        <!-- Hapus -->
                                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada pesan masuk</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $messages->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
