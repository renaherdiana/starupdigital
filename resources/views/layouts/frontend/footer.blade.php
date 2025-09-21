<!-- Footer Start -->
<div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <!-- Brand / Title -->
                <a href="#" class="navbar-brand mb-3 d-block">
                    <h1 class="display-6 text-primary mb-0">
                        {{ $social->title ?? 'NeoWeb Social Media' }}
                    </h1>
                </a>
                <p class="mb-4">
                    {{ $social->description ?? 'Connect with us on social media and stay updated with our latest digital solutions and creative works.' }}
                </p>

                <!-- Social Media Links -->
                <div class="d-flex flex-column gap-2">
                    @if($social)
                        @foreach(['twitter','facebook','linkedin','instagram'] as $platform)
                            @php
                                $usernameField = $platform . '_username';
                                $urlField = $platform . '_url';
                                $imageField = $platform . '_image';

                                $username = $social->$usernameField ?? null;
                                $url = $social->$urlField ?? null;
                                $image = $social->$imageField
                                    ? asset('storage/' . $social->$imageField)
                                    : asset('img/' . strtoupper($platform) . '.png');
                            @endphp

                            @if($username)
                                <a href="{{ $url ?? '#' }}" target="_blank" class="d-flex align-items-center social-item px-3 py-2 rounded text-decoration-none">
                                    <img src="{{ $image }}" alt="{{ ucfirst($platform) }}" width="26" height="26" class="me-3">
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold text-white small">{{ ucfirst($platform) }}</span>
                                        <span class="text-white-50 small">{{ $username }}</span>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @else
                        <p class="text-muted">Belum ada data social media.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright -->
<div class="container-fluid bg-dark text-white border-top border-secondary py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        &copy; KELOMPOK 4 All Right Reserved.
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- Footer Styles -->
<style>
.social-item {
    background-color: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    color: inherit;
    margin-bottom: 0.5rem;
    cursor: pointer;
}
.social-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
}
.contact-item {
    background-color: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    transition: all 0.3s ease;
}
.contact-item:hover {
    background-color: rgba(255, 255, 255, 0.08);
}
.icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0d6efd;
    font-size: 14px;
}
</style>
