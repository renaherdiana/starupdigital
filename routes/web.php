<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use App\Http\Controllers\Backend\ServicesBackendController;
use App\Http\Controllers\Backend\GalleryBackendController;
use App\Http\Controllers\Backend\TestimonialBackendController;
use App\Http\Controllers\Backend\SejarahBackendController;
use App\Http\Controllers\Backend\TenagaKerjaBackendController;
use App\Http\Controllers\Backend\PartnersBackendController;
use App\Http\Controllers\Backend\ContactBackendController;
use App\Http\Controllers\Backend\SocialMediaBackendController;
use App\Http\Controllers\Auth\LoginController;

// Route root selalu ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardBackendController::class, 'index'])->name('dashboard.index');

// Dashboard
Route::get('/dashboard', [DashboardBackendController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/admin-notes/create', [DashboardBackendController::class, 'createAdminNote'])->name('dashboard.createAdminNote');
Route::post('/dashboard/admin-notes', [DashboardBackendController::class, 'storeAdminNote'])->name('dashboard.storeAdminNote');
Route::get('/dashboard/admin-notes/{id}/edit', [DashboardBackendController::class, 'editAdminNote'])->name('dashboard.editAdminNote');
Route::put('/dashboard/admin-notes/{id}', [DashboardBackendController::class, 'updateAdminNote'])->name('dashboard.updateAdminNote');
Route::delete('/dashboard/admin-notes/{id}', [DashboardBackendController::class, 'destroyAdminNote'])->name('dashboard.destroyAdminNote');


// ==================== About ====================
Route::get('/about', [AboutBackendController::class, 'index'])->name('about.index');
Route::get('/about/create', [AboutBackendController::class, 'create'])->name('about.create');
Route::post('/about/store', [AboutBackendController::class, 'store'])->name('about.store');
Route::get('/about/show/{id}', [AboutBackendController::class, 'show'])->name('about.show');
Route::get('/about/{id}/edit', [AboutBackendController::class, 'edit'])->name('about.edit');
Route::put('/about/{id}', [AboutBackendController::class, 'update'])->name('about.update');
Route::delete('/about/{id}', [AboutBackendController::class, 'destroy'])->name('about.destroy');

// ==================== Services ====================
Route::get('/services', [ServicesBackendController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServicesBackendController::class, 'create'])->name('services.create');
Route::post('/services', [ServicesBackendController::class, 'store'])->name('services.store');
Route::get('/services/{service}', [ServicesBackendController::class, 'show'])->name('services.show');
Route::get('/services/{service}/edit', [ServicesBackendController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServicesBackendController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServicesBackendController::class, 'destroy'])->name('services.destroy');

// ==================== Gallery ====================
Route::get('/galeri', [GalleryBackendController::class, 'index'])->name('galeri.index');
Route::get('/galeri/create', [GalleryBackendController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GalleryBackendController::class, 'store'])->name('galeri.store');
Route::get('/galeri/{galeri}', [GalleryBackendController::class, 'show'])->name('galeri.show');
Route::get('/galeri/{galeri}/edit', [GalleryBackendController::class, 'edit'])->name('galeri.edit');
Route::put('/galeri/{galeri}', [GalleryBackendController::class, 'update'])->name('galeri.update');
Route::delete('/galeri/{galeri}', [GalleryBackendController::class, 'destroy'])->name('galeri.destroy');

// ==================== Testimonial ====================
Route::get('/testimonial', [TestimonialBackendController::class, 'index'])->name('testimonial.index');
Route::get('/testimonial/create', [TestimonialBackendController::class, 'create'])->name('testimonial.create');
Route::post('/testimonial', [TestimonialBackendController::class, 'store'])->name('testimonial.store');
Route::get('/testimonial/{id}', [TestimonialBackendController::class, 'show'])->name('testimonial.show');
Route::get('/testimonial/{id}/edit', [TestimonialBackendController::class, 'edit'])->name('testimonial.edit');
Route::put('/testimonial/{id}', [TestimonialBackendController::class, 'update'])->name('testimonial.update');
Route::delete('/testimonial/{id}', [TestimonialBackendController::class, 'destroy'])->name('testimonial.destroy');

// ==================== Sejarah ====================
Route::get('/sejarah', [SejarahBackendController::class, 'index'])->name('sejarah.index');
Route::get('/sejarah/create', [SejarahBackendController::class, 'create'])->name('sejarah.create');
Route::post('/sejarah', [SejarahBackendController::class, 'store'])->name('sejarah.store');
Route::get('/sejarah/{id}', [SejarahBackendController::class, 'show'])->name('sejarah.show');
Route::get('/sejarah/{id}/edit', [SejarahBackendController::class, 'edit'])->name('sejarah.edit');
Route::put('/sejarah/{id}', [SejarahBackendController::class, 'update'])->name('sejarah.update');
Route::delete('/sejarah/{id}', [SejarahBackendController::class, 'destroy'])->name('sejarah.destroy');
Route::patch('/sejarah/{id}/toggle-ajax', [SejarahBackendController::class, 'toggleAjax'])->name('sejarah.toggleAjax');

// ==================== Tenaga Kerja ====================
Route::get('/tenaga-kerja', [TenagaKerjaBackendController::class, 'index'])->name('tenaga-kerja.index');
Route::get('/tenaga-kerja/create', [TenagaKerjaBackendController::class, 'create'])->name('tenaga-kerja.create');
Route::post('/tenaga-kerja', [TenagaKerjaBackendController::class, 'store'])->name('tenaga-kerja.store');
Route::get('/tenaga-kerja/{id}', [TenagaKerjaBackendController::class, 'show'])->name('tenaga-kerja.show');
Route::get('/tenaga-kerja/{id}/edit', [TenagaKerjaBackendController::class, 'edit'])->name('tenaga-kerja.edit');
Route::put('/tenaga-kerja/{id}', [TenagaKerjaBackendController::class, 'update'])->name('tenaga-kerja.update');
Route::delete('/tenaga-kerja/{id}', [TenagaKerjaBackendController::class, 'destroy'])->name('tenaga-kerja.destroy');
Route::get('/tenaga-kerja/{id}/toggle', [TenagaKerjaBackendController::class, 'toggleActive'])->name('tenaga-kerja.toggle');

// ==================== Partners ====================
Route::get('/partners', [PartnersBackendController::class, 'index'])->name('partners.index');
Route::get('/partners/create', [PartnersBackendController::class, 'create'])->name('partners.create');
Route::post('/partners', [PartnersBackendController::class, 'store'])->name('partners.store');
Route::get('/partners/{id}', [PartnersBackendController::class, 'show'])->name('partners.show');
Route::get('/partners/{id}/edit', [PartnersBackendController::class, 'edit'])->name('partners.edit');
Route::put('/partners/{id}', [PartnersBackendController::class, 'update'])->name('partners.update');
Route::delete('/partners/{id}', [PartnersBackendController::class, 'destroy'])->name('partners.destroy');
Route::get('/partners/{id}/toggle', [PartnersBackendController::class, 'toggleActive'])->name('partners.toggle');

// ==================== Contact ====================
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactBackendController::class, 'index'])->name('contact.index');          // Menampilkan list contact
    Route::get('/create', [ContactBackendController::class, 'create'])->name('contact.create');   // Form tambah contact
    Route::post('/', [ContactBackendController::class, 'store'])->name('contact.store');          // Simpan contact baru
    Route::get('/{id}', [ContactBackendController::class, 'show'])->name('contact.show');         // Detail contact
    Route::get('/{id}/edit', [ContactBackendController::class, 'edit'])->name('contact.edit');    // Form edit contact
    Route::put('/{id}', [ContactBackendController::class, 'update'])->name('contact.update');     // Update contact
    Route::delete('/{id}', [ContactBackendController::class, 'destroy'])->name('contact.destroy');// Hapus contact
});

// ==================== Social Media ====================
Route::get('/socialmedia', [SocialMediaBackendController::class, 'index'])->name('socialmedia.index');      // list data
Route::get('/socialmedia/create', [SocialMediaBackendController::class, 'create'])->name('socialmedia.create'); // form tambah
Route::post('/socialmedia', [SocialMediaBackendController::class, 'store'])->name('socialmedia.store');        // simpan baru
Route::get('/socialmedia/{social}/edit', [SocialMediaBackendController::class, 'edit'])->name('socialmedia.edit'); // form edit
Route::put('/socialmedia/{social}', [SocialMediaBackendController::class, 'update'])->name('socialmedia.update');  // update data
Route::get('/socialmedia/{social}', [SocialMediaBackendController::class, 'show'])->name('socialmedia.show');     // detail
Route::delete('/socialmedia/{social}', [SocialMediaBackendController::class, 'destroy'])->name('socialmedia.destroy'); // hapus

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // ✅ GET untuk form login
Route::post('/login', [LoginController::class, 'login'])->name('login.process'); // ✅ POST untuk proses login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (wajib login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardBackendController::class, 'index'])->name('dashboard.index');
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
