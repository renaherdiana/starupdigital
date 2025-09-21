<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\{
    AboutBackendController,
    ContactBackendController,
    GalleryBackendController,
    SejarahBackendController,
    PartnersBackendController,
    ServicesBackendController,
    DashboardBackendController,
    SocialMediaBackendController,
    TenagaKerjaBackendController,
    TestimonialBackendController,
    MessageBackendController
};
use App\Http\Controllers\Frontend\{
    HomeFrontendController,
    SejarahFrontendController,
    TenagakerjaFrontendController,
    MessageFrontendController
};

// ------------------- ROOT -------------------
Route::get('/', fn() => redirect()->route('login'));

// ------------------- AUTH -------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');       // Form login
Route::post('/login', [LoginController::class, 'login'])->name('login.process');      // Proses login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');           // Logout

// ------------------- BACKEND (auth middleware) -------------------
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardBackendController::class, 'index'])->name('dashboard.index');

    // Hero routes
    Route::prefix('dashboard/hero')->group(function () {
        Route::get('create', [DashboardBackendController::class, 'createHero'])->name('dashboard.createHero');
        Route::post('/', [DashboardBackendController::class, 'storeHero'])->name('dashboard.storeHero');
        Route::get('{id}/edit', [DashboardBackendController::class, 'editHero'])->name('dashboard.editHero');
        Route::put('{id}', [DashboardBackendController::class, 'updateHero'])->name('dashboard.updateHero');
        Route::delete('{id}', [DashboardBackendController::class, 'destroyHero'])->name('dashboard.destroyHero');
        Route::get('dashboard/hero/{id}', [DashboardBackendController::class, 'showHero'])->name('dashboard.showHero');
    });

    // About
    Route::resource('about', AboutBackendController::class);

    // Services
    Route::resource('services', ServicesBackendController::class);

    // Gallery
    Route::resource('galeri', GalleryBackendController::class);

    // Testimonial
    Route::resource('testimonial', TestimonialBackendController::class);

    // Sejarah
    Route::prefix('sejarah')->group(function () {
        Route::get('/', [SejarahBackendController::class, 'index'])->name('sejarah.index');
        Route::get('create', [SejarahBackendController::class, 'create'])->name('sejarah.create');
        Route::post('/', [SejarahBackendController::class, 'store'])->name('sejarah.store');
        Route::get('{id}', [SejarahBackendController::class, 'show'])->name('sejarah.show');
        Route::get('{id}/edit', [SejarahBackendController::class, 'edit'])->name('sejarah.edit');
        Route::put('{id}', [SejarahBackendController::class, 'update'])->name('sejarah.update');
        Route::delete('{id}', [SejarahBackendController::class, 'destroy'])->name('sejarah.destroy');
        Route::patch('{id}/toggle-ajax', [SejarahBackendController::class, 'toggleAjax'])->name('sejarah.toggleAjax');
    });

    // Tenaga Kerja
    Route::prefix('tenaga-kerja')->group(function () {
        Route::get('/', [TenagaKerjaBackendController::class, 'index'])->name('tenaga-kerja.index');
        Route::get('create', [TenagaKerjaBackendController::class, 'create'])->name('tenaga-kerja.create');
        Route::post('/', [TenagaKerjaBackendController::class, 'store'])->name('tenaga-kerja.store');
        Route::get('{id}', [TenagaKerjaBackendController::class, 'show'])->name('tenaga-kerja.show');
        Route::get('{id}/edit', [TenagaKerjaBackendController::class, 'edit'])->name('tenaga-kerja.edit');
        Route::put('{id}', [TenagaKerjaBackendController::class, 'update'])->name('tenaga-kerja.update');
        Route::delete('{id}', [TenagaKerjaBackendController::class, 'destroy'])->name('tenaga-kerja.destroy');
        Route::get('{id}/toggle', [TenagaKerjaBackendController::class, 'toggleActive'])->name('tenaga-kerja.toggle');
    });

    // Partners
    Route::prefix('partners')->group(function () {
        Route::get('/', [PartnersBackendController::class, 'index'])->name('partners.index');
        Route::get('create', [PartnersBackendController::class, 'create'])->name('partners.create');
        Route::post('/', [PartnersBackendController::class, 'store'])->name('partners.store');
        Route::get('{id}', [PartnersBackendController::class, 'show'])->name('partners.show');
        Route::get('{id}/edit', [PartnersBackendController::class, 'edit'])->name('partners.edit');
        Route::put('{id}', [PartnersBackendController::class, 'update'])->name('partners.update');
        Route::delete('{id}', [PartnersBackendController::class, 'destroy'])->name('partners.destroy');
        Route::get('{id}/toggle', [PartnersBackendController::class, 'toggleActive'])->name('partners.toggle');
    });

    // Contact (title, subtitle, description)
    Route::resource('contact', ContactBackendController::class);

   // Messages (pesan dari frontend)
Route::prefix('messages')->group(function () {
    Route::get('/', [MessageBackendController::class, 'index'])->name('messages.index');
    Route::get('/{id}', [MessageBackendController::class, 'show'])->name('messages.show');
    Route::delete('/{id}', [MessageBackendController::class, 'destroy'])->name('messages.destroy');
});


    // Social Media
    Route::resource('socialmedia', SocialMediaBackendController::class);
});

// ------------------- FRONTEND -------------------
Route::get('/index', [HomeFrontendController::class, 'index'])->name('frontend.home');

Route::prefix('frontend')->group(function () {
    Route::get('/about', [HomeFrontendController::class, 'index'])->name('frontend.about');
    Route::get('/services', [HomeFrontendController::class, 'index'])->name('frontend.services');
    Route::get('/galeri', [HomeFrontendController::class, 'index'])->name('frontend.galeri');
    Route::get('/testimonial', [HomeFrontendController::class, 'index'])->name('frontend.testimonial');
    Route::get('/partners', [HomeFrontendController::class, 'partners'])->name('frontend.partners');
});

// Sejarah & Tenaga Kerja (Frontend)
Route::get('/tentang/sejarah', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');
Route::get('/tenagakerja', [TenagakerjaFrontendController::class, 'index'])->name('frontend.tenagakerja');

/// Kirim pesan contact
Route::post('/contact/send', [MessageFrontendController::class, 'store'])->name('contact.send');