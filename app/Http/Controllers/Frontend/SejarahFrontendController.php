<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use App\Models\SocialMedia;

class SejarahFrontendController extends Controller
{
    public function index()
    {
        // Ambil sejarah yang aktif
        $sejarah = Sejarah::where('is_active', 1)->latest()->first();

        // Ambil social media yang aktif
        $social = SocialMedia::where('is_active', 1)->first();
        
        return view('page.frontend.sejarah.index', compact('sejarah', 'social'));
    }
}
