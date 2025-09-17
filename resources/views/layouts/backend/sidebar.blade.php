<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" id="sidebar">
    <nav class="navbar bg-secondary navbar-dark">
        <!-- Logo / Brand -->
        <a href="{{ url('/dashboard') }}" class="navbar-brand mx-4 mb-3 d-flex align-items-center">
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
                <h6 class="mb-0">Admin</h6>
                <span>Kelompok4</span>
            </div>
        </div>

        <!-- Menu -->
        <div class="navbar-nav w-100">
            <a href="{{ url('/dashboard') }}" class="nav-item nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i>Dashboard
            </a>
            <a href="{{ url('/about') }}" class="nav-item nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }}">
                <i class="fas fa-info-circle me-2"></i>About
            </a>
            <a href="{{ url('/services') }}" class="nav-item nav-link {{ request()->segment(1) == 'services' ? 'active' : '' }}">
                <i class="fas fa-cogs me-2"></i>Services
            </a>
            <a href="{{ url('/galeri') }}" class="nav-item nav-link {{ request()->segment(1) == 'galeri' ? 'active' : '' }}">
                <i class="fas fa-image me-2"></i>Galeri
            </a>
            <a href="{{ url('/testimonial') }}" class="nav-item nav-link {{ request()->segment(1) == 'testimonial' ? 'active' : '' }}">
                <i class="fas fa-comments me-2"></i>Testimonial
            </a>
            <a href="{{ url('/sejarah') }}" class="nav-item nav-link {{ request()->segment(1) == 'sejarah' ? 'active' : '' }}">
                <i class="fas fa-history me-2"></i>Sejarah
            </a>
            <a href="{{ url('/tenaga-kerja') }}" class="nav-item nav-link {{ request()->segment(1) == 'tenaga-kerja' ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>Tenaga Kerja
            </a>
            <a href="{{ url('/partners') }}" class="nav-item nav-link {{ request()->segment(1) == 'partners' ? 'active' : '' }}">
                <i class="fas fa-handshake me-2"></i>Partners
            </a>
            <a href="{{ url('/contact') }}" class="nav-item nav-link {{ request()->segment(1) == 'contact' ? 'active' : '' }}">
                <i class="fas fa-envelope me-2"></i>Contact
            </a>
            <a href="{{ route('socialmedia.index') }}" class="nav-item nav-link {{ request()->segment(1) == 'socialmedia' ? 'active' : '' }}">
                <i class="fas fa-share-alt me-2"></i>Social Media
            </a>

            <!-- Log Out -->
            <form action="{{ route('logout') }}" method="POST" class="nav-item">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start p-0 m-0">
                    <i class="fas fa-sign-out-alt me-2"></i>Log Out
                </button>
            </form>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
