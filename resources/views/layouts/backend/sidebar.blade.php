<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" id="sidebar">
    <nav class="navbar bg-secondary navbar-dark">
        <!-- Logo / Brand -->
        <a href="{{ route('dashboard.index') }}" class="navbar-brand mx-4 mb-3 d-flex align-items-center">
            <h3 class="text-primary mb-0">NeoWeb</h3>
        </a>

        <!-- Profile -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assetsbackend/img/user.jpg') }}" 
                     alt="Admin" style="width: 40px; height: 40px; object-fit: cover;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Kelompok4</span>
            </div>
        </div>

        <!-- Menu -->
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard.index') }}" class="nav-item nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
            <a href="{{ route('about.index') }}" class="nav-item nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}">
                <i class="fas fa-info-circle me-2"></i>About
            </a>
            <a href="{{ route('services.index') }}" class="nav-item nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="fas fa-cogs me-2"></i>Services
            </a>
            <a href="{{ route('galeri.index') }}" class="nav-item nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                <i class="fas fa-image me-2"></i>Galeri
            </a>
            <a href="{{ route('testimonial.index') }}" class="nav-item nav-link {{ request()->routeIs('testimonial.*') ? 'active' : '' }}">
                <i class="fas fa-comments me-2"></i>Testimonial
            </a>
            <a href="{{ route('sejarah.index') }}" class="nav-item nav-link {{ request()->routeIs('sejarah.*') ? 'active' : '' }}">
                <i class="fas fa-history me-2"></i>Sejarah
            </a>
            <a href="{{ route('tenaga-kerja.index') }}" class="nav-item nav-link {{ request()->routeIs('tenaga-kerja.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>Tenaga Kerja
            </a>
            <a href="{{ route('partners.index') }}" class="nav-item nav-link {{ request()->routeIs('partners.*') ? 'active' : '' }}">
                <i class="fas fa-handshake me-2"></i>Partners
            </a>
            <a href="{{ route('contact.index') }}" class="nav-item nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                <i class="fas fa-envelope me-2"></i>Contact
            </a>
            <a href="{{ route('messages.index') }}" class="nav-item nav-link {{ request()->routeIs('messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope-open-text me-2"></i>Message
            </a>
            <a href="{{ route('socialmedia.index') }}" class="nav-item nav-link {{ request()->routeIs('socialmedia.*') ? 'active' : '' }}">
                <i class="fas fa-share-alt me-2"></i>Social Media
            </a>

            <!-- Log Out -->
            <form action="{{ route('logout') }}" method="POST" class="nav-item mt-3">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start p-0 m-0">
                    <i class="fas fa-sign-out-alt me-2"></i>Log Out
                </button>
            </form>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
