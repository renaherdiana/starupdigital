@extends('layouts.backend.app')

@section('content')
<!-- Header Halaman -->
<div class="bg-secondary text-center rounded-3 p-4 mb-4 shadow-sm">
    <h1 class="text-white fw-bold mb-0">Edit About</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bg-secondary rounded-3 shadow-sm p-4 text-white">

            <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Photo Centered -->
                @if($about->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/'.$about->photo) }}" 
                             alt="Current Photo" 
                             style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="form-control bg-dark text-white mb-4">

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white" 
                           value="{{ old('title', $about->title) }}" placeholder="Masukkan judul">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control bg-dark text-white" 
                              placeholder="Masukkan deskripsi">{{ old('description', $about->description) }}</textarea>
                </div>

                <!-- Active Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                        {{ old('is_active', $about->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_active">Active</label>
                </div>

                <!-- Years Experience -->
                <div class="mb-3">
                    <label for="experience" class="form-label fw-semibold">Years Experience</label>
                    <input type="number" name="experience" id="experience" class="form-control bg-dark text-white"
                           value="{{ old('experience', $about->experience) }}">
                </div>

                <!-- Happy Customers -->
                <div class="mb-3">
                    <label for="customers" class="form-label fw-semibold">Happy Customers</label>
                    <input type="number" name="customers" id="customers" class="form-control bg-dark text-white"
                           value="{{ old('customers', $about->customers) }}">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">No. Telephone</label>
                    <input type="tel" name="phone" id="phone" class="form-control bg-dark text-white" 
                           value="{{ old('phone', $about->phone) }}" placeholder="+62...">
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('about.index') }}" class="btn btn-danger px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
