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
                <div class="col-lg-6 hero-header-text py-5">
                    <div class="py-5 px-3 ps-lg-0">
                        <h1 class="font-dancing-script text-primary animated slideInLeft">Welcome</h1>
                        <h1 style="color: rgb(0, 9, 141);" class="display-1 mb-4 animated slideInLeft">Digitalize your business with NeoWeb</h1>
                        <div class="row g-4 animated slideInLeft">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square btn btn-primary flex-shrink-0">
                                        <i class="fa fa-phone text-dark"></i>
                                    </div>
                                    <div class="px-3">
                                        <h5 class="text-primary mb-0">Call Us</h5>
                                        <p class="fs-5 text-dark mb-0">+62 895335053813</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square btn btn-primary flex-shrink-0">
                                        <i class="fa fa-envelope text-dark"></i>
                                    </div>
                                    <div class="px-3">
                                        <h5 class="text-primary mb-0">Mail Us</h5>
                                        <p class="fs-5 text-dark mb-0">NeoWeb@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="owl-carousel header-carousel animated fadeIn">
                        <img class="img-fluid" src="img/INDEX.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <img class="img-fluid mb-3" src="img/ABOUT.jpeg" alt="">
                    <div class="d-flex align-items-center bg-light">
                        <div class="btn-square flex-shrink-0 bg-primary" style="width: 100px; height: 100px;">
                            <i class="fa fa-phone fa-2x text-dark"></i>
                        </div>
                        <div class="px-3">
                            <h3>+62 895335053813</h3>
                            <span>Call us direct 24/7 for get a free consultation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 style="color: rgb(0, 9, 141);"class="font-dancing-script text-primary">About Us</h1>
                    <p class="mb-4">NeoWeb adalah yang berfokus pada jasa pembuatan website modern
                     dan responsif. Kami membantu bisnis, UMKM, hingga personal brand
                     untuk memiliki identitas digital yang profesional.</p>
                    <div class="row g-3 mb-5">
                        <div class="col-sm-6">
                            <div class="bg-light text-center p-4">
                                <i class="fas fa-calendar-alt fa-4x text-primary"></i>
                                <h1 class="display-5" data-toggle="counter-up">2</h1>
                                <p class="text-dark text-uppercase mb-0">Years experience</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-light text-center p-4">
                                <i class="fas fa-users fa-4x text-primary"></i>
                                <h1 class="display-5" data-toggle="counter-up">100</h1>
                                <p class="text-dark text-uppercase mb-0">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary text-uppercase px-5 py-3" href="">Read More</a>
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
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 border-bottom border-end wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/LAPTOP.JPG" alt="">
                        <h3 class="mb-3">Web Development</h3>
                        <p class="mb-3">Buat website profesional yang siap memikat pengunjung.</p>
                        <a class="btn btn-sm btn-primary text-uppercase" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 border-bottom border-lg-end wow fadeIn" data-wow-delay="0.3s">
                        <img class="img-fluid" src="img/HP.jpg" alt="">
                        <h3 class="mb-3">Mobile App Development</h3>
                        <p class="mb-3">Aplikasi mobile cepat, modern, dan mudah digunakan.</p>
                        <a class="btn btn-sm btn-primary text-uppercase" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 border-bottom border-end border-lg-end-0 wow fadeIn"
                        data-wow-delay="0.5s">
                        <img class="img-fluid" src="img/MARKETING.jpg" alt="">
                        <h3 class="mb-3">Digital Marketing</h3>
                        <p class="mb-3">Tingkatkan brand dan penjualan lewat strategi digital.</p>
                        <a class="btn btn-sm btn-primary text-uppercase my-2" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 border-bottom border-lg-bottom-0 border-lg-end wow fadeIn"
                        data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/DESAIN.jpg" alt="">
                        <h3 class="mb-3">Graphic & UI/UX Design</h3>
                        <p class="mb-3">Desain kreatif yang membuat brand Anda standout.</p>
                        <a class="btn btn-sm btn-primary text-uppercase" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 border-end wow fadeIn" data-wow-delay="0.3s">
                        <img class="img-fluid" src="img/BUMI.jpg" alt="">
                        <h3 class="mb-3">IT Support & Maintenance</h3>
                        <p class="mb-3">Dukungan teknis dan pemeliharaan sistem secara profesional.</p>
                        <a class="btn btn-sm btn-primary text-uppercase" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-item h-100 p-4 wow fadeIn" data-wow-delay="0.5s">
                        <img class="img-fluid" src="img/KERANJANG.jpg" alt="">
                        <h3 class="mb-3">E-commerce Solutions</h3>
                        <p class="mb-3">Bangun toko online yang menarik dan mudah digunakan.</p>
                        <a class="btn btn-sm btn-primary text-uppercase" href="">Read More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
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
            <div class="row g-0">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="gallery-item h-100">
                        <img src="img/DEVELOPMENT.jpeg" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="img/DEVELOPMENT.jpeg" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-1"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
                    <div class="gallery-item h-100">
                        <img src="img/WEBSITE.jpeg" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="img/WEBSITE.jpeg" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-2"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 wow fadeIn" data-wow-delay="0.6s">
                    <div class="gallery-item h-100">
                        <img src="img/WEB DESIGN.jpeg" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="img/WEB DESIGN.jpeg" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-3"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
                    <div class="gallery-item h-100">
                        <img src="img/HTML.jpeg" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="img/HTML.jpeg" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-4"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s">
                    <div class="gallery-item h-100">
                        <img src="img/WEBSITE 2.jpeg" class="img-fluid w-100 h-100" alt="">
                        <div class="gallery-icon">
                            <a href="img/WEBSITE 2.jpeg" class="btn btn-primary btn-lg-square"
                                data-lightbox="Gallery-5"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Testimonials Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Testimonial</h1>
                <h1 class="mb-5">What Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center bg-light p-4">
                    <i class="fa fa-quote-left fa-3x mb-3"></i>
                    <p>Timnya responsif dan ramah. Aplikasi mobile yang dibuat benar-benar membantu operasional bisnis kami</p>
                    <img class="img-fluid mx-auto border p-1 mb-3" src="img/SITI RAHMA.jpeg" alt="">
                    <h4 class="mb-1">Siti Rahma</h4>
                </div>
                <div class="text-center bg-light p-4">
                    <i class="fa fa-quote-left fa-3x mb-3"></i>
                    <p>Dengan strategi digital marketing mereka, brand kami jadi lebih dikenal dan penjualan meningkat signifikan."</p>
                    <img class="img-fluid mx-auto border p-1 mb-3" src="img/BUDI SANTOSO.jpeg" alt="">
                    <h4 class="mb-1">Budi Santoso</h4>
                </div>
                <div class="text-center bg-light p-4">
                    <i class="fa fa-quote-left fa-3x mb-3"></i>
                    <p>Layanan mereka sangat profesional! Website perusahaan kami jadi lebih modern dan mudah diakses pelanggan.</p>
                    <img class="img-fluid mx-auto border p-1 mb-3" src="img/ANDI PRATAMA.jpeg" alt="">
                    <h4 class="mb-1">Andi Pratama</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials End -->

    <!-- Sejarah Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn text-center" data-wow-delay="0.2s">
                    <img class="img-fluid mb-3" src="{{ asset('img/NEOWEB TECHNOLOGY.jpeg') }}" alt="Neoweb Logo">
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h2 class="font-dancing-script text-primary mb-3">Sejarah</h2>
                    <p class="mb-4">
                        Neoweb berdiri pada 2020 dengan fokus awal pembuatan website sederhana untuk UMKM. 
                        Seiring perkembangan, layanan Neoweb meluas ke branding, desain grafis, media sosial, 
                        hingga digital marketing Pada tahun 2022, Neoweb meluncurkan Creative Hub sebagai ruang kolaborasi tim kreatif—desainer, 
                        developer, dan digital strategist—untuk menghadirkan solusi digital yang inovatif dan relevan Kini, Neoweb telah dipercaya oleh berbagai klien dari beragam industri dan terus tumbuh 
                        dengan moto:
                    </p>
                    <h2 class="fw-bold">“Bring Your Ideas to Digital Life.”</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Sejarah End -->

    <!-- Tenaga Kerja -->
    <div class="container-fluid overflow-hidden py-5 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.2s">
                <h1 class="font-dancing-script text-primary">Tenaga Kerja</h1>
                <h1 class="mb-5">Our Experienced Specialists</h1>
            </div>
           
            <div class="row g-4 team center justify-content-center">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/RIZKY.jpeg" alt="">
                        <div class="team-overlay">
                            <p class="text-primary mb-1">Web Developer</p>
                            <h4>Rizky</h4>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/MAYA.jpeg" alt="">
                        <div class="team-overlay">
                            <p class="text-primary mb-1">UI/UX Designer</p>
                            <h4>Maya</h4>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="team-item position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/NADIA.jpeg" alt="">
                        <div class="team-overlay">
                            <p class="text-primary mb-1">Digital Marketer</p>
                            <h4>Nadia</h4>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2 me-3" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="btn btn-dark btn-sm-square border-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tenaga Kerja -->
    
    <!-- Partners Start -->
    <div class="partners-section">
        <h1>Partners</h1>
        <p>Awesome People We Work With</p>
    </div>

    <div class="partners-container">
        <div class="partner-card">
            <img src="path-to-image/TechNova-Logo.png" alt="TechNova Logo">
            <h2>TechNova</h2>
            <p>Perusahaan teknologi inovatif yang mengembangkan solusi berbasis AI dan cloud untuk membantu bisnis berkembang lebih cepat.</p>
            <a href="#" class="read-more">READ MORE &rarr;</a>
        </div>

        <div class="partner-card">
            <img src="path-to-image/CreativeHub-Logo.png" alt="CreativeHub Logo">
            <h2>CreativeHub</h2>
            <p>Agensi kreatif yang berfokus pada branding, desain visual, dan strategi digital untuk meningkatkan citra bisnis.</p>
            <a href="#" class="read-more">READ MORE &rarr;</a>
        </div>
    </div>
 <!-- Partners End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="font-dancing-script text-primary">Contact</h1>
                <h1 class="mb-5">Have Any Query? Contact Us</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working
                        contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code
                        and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message"
                                            style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3 ms-0" type="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Contact End -->
@endsection