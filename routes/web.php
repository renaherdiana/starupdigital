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

    // Admin Notes
    Route::prefix('dashboard/admin-notes')->group(function () {
        Route::get('create', [DashboardBackendController::class, 'createAdminNote'])->name('dashboard.createAdminNote');
        Route::post('/', [DashboardBackendController::class, 'storeAdminNote'])->name('dashboard.storeAdminNote');
        Route::get('{id}/edit', [DashboardBackendController::class, 'editAdminNote'])->name('dashboard.editAdminNote');
        Route::put('{id}', [DashboardBackendController::class, 'updateAdminNote'])->name('dashboard.updateAdminNote');
        Route::delete('{id}', [DashboardBackendController::class, 'destroyAdminNote'])->name('dashboard.destroyAdminNote');
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

    // Contact
    Route::resource('contact', ContactBackendController::class);

    // Messages
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageBackendController::class, 'index'])->name('messages.index');
        Route::get('{id}', [MessageBackendController::class, 'show'])->name('messages.show');
        Route::delete('{id}', [MessageBackendController::class, 'destroy'])->name('messages.destroy');
    });

    // Social Media
    Route::resource('socialmedia', SocialMediaBackendController::class);
});

// ------------------- FRONTEND -------------------
Route::get('/index', [HomeFrontendController::class, 'index'])->name('frontend.home');
Route::get('/sejarah', [SejarahFrontendController::class, 'index'])->name('frontend.sejarah');
Route::get('/tenagakerja', [TenagakerjaFrontendController::class, 'index'])->name('frontend.tenagakerja');
Route::post('/contact/send', [MessageFrontendController::class, 'store'])->name('contact.send');
