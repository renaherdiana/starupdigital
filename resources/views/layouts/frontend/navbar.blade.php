<!-- Navbar Start -->
<div class="container-fluid bg-light sticky-top p-0">
  <nav class="navbar navbar-expand-lg navbar-light p-0">
    <a href="{{ route('frontend.home') }}" class="navbar-brand bg-primary py-4 px-5 me-0">
      <h1 class="mb-0"></i>NeoWeb</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse p-3" id="navbarCollapse">
      <div class="navbar-nav mx-auto">
        <a href="{{ route('frontend.home') }}" 
           class="nav-item nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
           HOME
        </a>
        <a href="{{ route('frontend.sejarah') }}" 
           class="nav-item nav-link {{ request()->routeIs('frontend.sejarah') ? 'active' : '' }}">
           SEJARAH
        </a>
        <a href="{{ route('frontend.tenagakerja') }}" 
           class="nav-item nav-link {{ request()->routeIs('frontend.tenagakerja') ? 'active' : '' }}">
           TENAGA KERJA
        </a>
      </div>

    </div>
  </nav>
</div>
<!-- Navbar End -->
