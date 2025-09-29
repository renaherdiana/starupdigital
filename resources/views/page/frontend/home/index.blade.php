@extends('layouts.frontend.app')
@section('content')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Home Start -->
    <div class="container-fluid p-0 hero-header bg-light mb-5">
        <div class="container p-0">
            <div class="row g-0 align-items-center">

                <!-- Teks Hero -->
                <div class="col-lg-6 wow fadeIn order-2 order-lg-1 px-4 px-lg-5 text-center text-lg-start" data-wow-delay="0.5s">
                    @if($hero)
                        @if($hero->title)
                            <h2 class="font-dancing-script mb-3"
                                style="line-height: 1.2; font-size: 2.5rem; color: #00098d;">
                                {!! nl2br(e($hero->title)) !!}
                            </h2>
                        @endif

                        @if($hero->subtitle)
                            <h1 class="mb-3"
                                style="line-height: 1.3; font-size: 3.5rem; color: #00098d;">
                                {!! nl2br(e($hero->subtitle)) !!}
                            </h1>
                        @endif

                        @if($hero->description)
                            <p class="mb-4" style="font-size: 1.2rem; color: #00098d;">
                                {!! nl2br(e($hero->description)) !!}
                            </p>
                        @endif
                    @else
                        <h2 class="font-dancing-script mb-3" style="line-height: 1.2; font-size: 2.5rem; color: #00098d;">
                            Digitalize Your
                        </h2>
                        <h1 class="mb-3" style="line-height: 1.3; font-size: 3.5rem; color: #00098d;">
                            Business With NeoWeb
                        </h1>
                        <p class="mb-4" style="font-size: 1.2rem; color: #00098d;">
                            Jadikan bisnis Anda lebih digital dan terhubung dengan pelanggan melalui website modern.
                        </p>
                    @endif
                </div>

                <!-- Gambar Hero -->
                <div class="col-lg-6 wow fadeIn order-1 order-lg-2 text-center px-4 px-lg-5" data-wow-delay="0.2s">
                    @php
                        $heroImage = $hero && $hero->image ? asset('storage/' . $hero->image) : asset('assetsbackend/img/default-hero.jpg');
                        $heroAlt = $hero && $hero->title ? $hero->title : 'Default Hero';
                    @endphp
                    <img class="img-fluid mb-3 rounded shadow"
                        src="{{ $heroImage }}"
                        alt="{{ $heroAlt }}"
                        style="max-height: 400px; object-fit: cover; filter: brightness(70%);">
                </div>

            </div>
        </div>
    </div>
    <!-- Home End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Gambar & Kontak -->
                @if($about?->photo || $about?->phone)
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    @if($about?->photo)
                    <img class="img-fluid mb-3"
                        src="{{ asset('storage/' . $about->photo) }}"
                        alt="{{ $about->title }}">
                    @endif

                    @if($about?->phone)
                    <div class="d-flex align-items-center bg-light p-3 rounded">
                        <div class="btn-square flex-shrink-0 bg-primary d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                            <i class="fa fa-phone fa-2x text-dark"></i>
                        </div>
                        <div class="px-3">
                            <h3>{{ $about->phone }}</h3>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Deskripsi & Statistik -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    @if($about)
                        @if($about->title)
                            <h1 class="font-dancing-script text-primary">{{ $about->title }}</h1>
                        @endif

                        @if($about->description)
                            <p class="mb-4">{{ $about->description }}</p>
                        @endif

                        <div class="row g-3 mb-5">
                            @if($about->experience)
                            <div class="col-sm-6">
                                <div class="bg-light text-center p-4 rounded">
                                    <i class="fas fa-calendar-alt fa-4x text-primary"></i>
                                    <h1 class="display-5" data-toggle="counter-up">{{ $about->experience }}</h1>
                                    <p class="text-dark text-uppercase mb-0">Years Experience</p>
                                </div>
                            </div>
                            @endif

                            @if($about->customers)
                            <div class="col-sm-6">
                                <div class="bg-light text-center p-4 rounded">
                                    <i class="fas fa-users fa-4x text-primary"></i>
                                    <h1 class="display-5" data-toggle="counter-up">{{ $about->customers }}</h1>
                                    <p class="text-dark text-uppercase mb-0">Happy Customers</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                        <h1 class="font-dancing-script text-primary">About Us</h1>
                        <p class="mb-4"></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="font-dancing-script text-primary">Our Services</h1>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4 g-md-0 text-center">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item h-100 p-4 border-bottom border-end wow fadeIn" data-wow-delay="0.1s">
                            @if($service->photo)
                                <img class="img-fluid" src="{{ asset('storage/'.$service->photo) }}" alt="{{ $service->title }}">
                            @endif
                            <h3 class="mb-3">{{ $service->title }}</h3>
                            <p class="mb-3">{{ $service->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No Services added yet. Stay tuned!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Gallery</h1>
                <h1 class="mb-5">Explore Our Gallery</h1>
            </div>
            <div class="row g-3">
                @if($galeris->count() > 0)
                    @foreach($galeris as $galeri)
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
                        <div class="gallery-item position-relative">
                            <img src="{{ Storage::url($galeri->image) }}" class="img-fluid w-100" alt="{{ $galeri->title }}">
                            <div class="gallery-icon position-absolute top-50 start-50 translate-middle">
                                <a href="{{ Storage::url($galeri->image) }}" class="btn btn-primary btn-lg-square" data-lightbox="Gallery">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="fs-5 text-muted">No galeries added yet. Stay tuned!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Gallery End -->

<!-- Testimonials Start -->
<div class="container py-5">
    <div class="text-center wow fadeIn" data-wow-delay="0.2s">
        <h1 class="font-dancing-script text-primary">Testimonial</h1>
        <h1 class="mb-5">What Clients Say!</h1>
    </div>

    <!-- Carousel -->
    <div class="owl-carousel testimonial-carousel">
        @foreach($testimonials as $testimonial)
        <div class="text-center bg-light p-4 rounded shadow-sm">
            <img class="img-fluid rounded-circle mx-auto d-block mb-3"
                src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('img/default-user.jpg') }}"
                alt="{{ $testimonial->name }}" style="width:80px;height:80px;">

            <h5>{{ $testimonial->name }}</h5>

            <!-- Rating -->
            <div class="mb-2">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $testimonial->rating)
                        <i class="bi bi-star-fill text-warning"></i>
                    @else
                        <i class="bi bi-star text-warning"></i>
                    @endif
                @endfor
            </div>

            <p>{{ $testimonial->testimonial }}</p>
        </div>
        @endforeach
    </div>

    <!-- Custom Nav Buttons -->
    <div class="text-center mt-3">
        <button id="prevTestimonial" class="testimonial-btn mx-2">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button id="nextTestimonial" class="testimonial-btn mx-2">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</div>


<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

<!-- Custom CSS -->
<style>
/* Tombol custom nav */
.testimonial-btn {
    background: none;       /* hilangkan background kotak */
    border: none;           /* hilangkan border */
    color: #0d6efd;         /* warna biru (Bootstrap primary) */
    font-size: 1.8rem;      /* ukuran ikon */
    cursor: pointer;
    transition: color 0.3s;
}

.testimonial-btn:hover {
    color: #0a58ca; /* warna lebih gelap saat hover */
}
</style>

<!-- jQuery + Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    var testimonialCarousel = $(".testimonial-carousel");

    testimonialCarousel.owlCarousel({
        loop: true,
        margin: 20,
        nav: false, // nav default off
        dots: true,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 800,
        responsive:{
            0:{ items:1 },
            768:{ items:2 },
            992:{ items:3 }
        }
    });

    // Tombol custom
    $("#prevTestimonial").click(function(){
        testimonialCarousel.trigger('prev.owl.carousel');
    });
    $("#nextTestimonial").click(function(){
        testimonialCarousel.trigger('next.owl.carousel');
    });
});
</script>
<!-- Testimonials End -->



    <!-- Partners Start -->
<div class="container-fluid blog p-0">
    <div class="text-center wow fadeIn" data-wow-delay="0.1s">
        <h1 class="font-dancing-script text-primary">Partners</h1>
        <h1 class="mb-5">Awesome People We Work With</h1>
    </div>

    @if($partners->isEmpty())
        <div class="text-center py-5">
            <p class="text-muted">Belum ada partners untuk ditampilkan.</p>
        </div>
    @else
        <div class="row g-0">
            @foreach($partners as $partner)
                {{-- Kolom teks --}}
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 d-flex flex-column justify-content-center bg-primary py-5 px-4 text-white">
                        <h3 class="mb-3">{{ $partner->name }}</h3>
                        <p>{{ $partner->description }}</p>
                    </div>
                </div>

                {{-- Kolom foto --}}
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="h-100">
                        @php
                            $photoPath = $partner->photo && \Illuminate\Support\Str::contains($partner->photo, 'partners/')
                                ? $partner->photo
                                : 'partners/' . $partner->photo;
                        @endphp
                        <img class="img-fluid w-100 h-100"
                             src="{{ $partner->photo ? asset('storage/' . $photoPath) : asset('img/default.jpg') }}"
                             alt="{{ $partner->name }}"
                             style="object-fit: cover;">
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

    <!-- Partners End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="font-dancing-script text-primary">{{ $contact->title ?? 'Contact' }}</h1>
                <h1 class="mb-5">{{ $contact->subtitle ?? 'Have Any Query? Contact Us' }}</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7">

                    {{-- alert sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- alert error --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p class="text-center mb-4">
                        {{ $contact->description ?? 'We are here to assist you...' }}
                    </p>

                    {{-- form message --}}
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Your Name" value="{{ old('name') }}" required>
                                        <label>Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email" value="{{ old('email') }}" required>
                                        <label>Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Subject" value="{{ old('subject') }}">
                                        <label>Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message"
                                                placeholder="Leave a message here"
                                                style="height: 150px" required>{{ old('message') }}</textarea>
                                        <label>Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3 ms-0" type="submit">
                                        SEND MESSAGE
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- end form --}}
                </div>
            </div>
        </div>
    </div>

<!-- Contact End -->

@endsection
