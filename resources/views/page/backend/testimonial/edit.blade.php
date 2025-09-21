@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit Testimonial</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Photo Centered -->
                @if($testimonial->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$testimonial->photo) }}" 
                             alt="{{ $testimonial->name }}" 
                             style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="form-control bg-dark text-white mb-4">

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" id="name" class="form-control bg-dark text-white" 
                           value="{{ old('name', $testimonial->name) }}" placeholder="Masukkan nama" required>
                </div>

                <!-- Testimoni -->
                <div class="mb-3">
                    <label for="testimonial" class="form-label fw-semibold">Testimoni</label>
                    <textarea name="testimonial" id="testimonial" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan testimoni" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                </div>

                <!-- Rating -->
                <div class="mb-3">
                    <label for="rating" class="form-label fw-semibold">Rating</label>
                    <select name="rating" id="rating" class="form-select bg-dark text-white" required>
                        <option value="">Pilih rating</option>
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                            </option>
                        @endfor
                    </select>
                    @error('rating')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                           {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
