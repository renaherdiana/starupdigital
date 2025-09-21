<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TenagaKerja;
use App\Models\SocialMedia;

class TenagakerjaFrontendController extends Controller
{
    public function index()
    {
        // Ambil semua tenaga kerja yang aktif, urut terbaru
        $team = TenagaKerja::where('is_active', 1)->latest()->get();

        // Ambil social media yang aktif
        $social = SocialMedia::where('is_active', 1)->first();

        return view('page.frontend.tenagakerja.index', compact('team', 'social'));
    }
}
