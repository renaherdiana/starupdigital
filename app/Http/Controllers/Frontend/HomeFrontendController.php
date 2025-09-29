<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\SocialMedia;
use App\Models\About;
use App\Models\Service;
use App\Models\Galeri;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Contact;

class HomeFrontendController extends Controller
{
    public function index()
    {
        $hero = Hero::active()->oldest()->first();
        $social       = SocialMedia::where('is_active', 1)->first();
        $about = About::where('is_active', 1)->oldest()->first();
        $services     = Service::where('is_active', 1)->get();
        $galeris      = Galeri::where('active', 1)->get();
        $testimonials = Testimonial::where('is_active', 1)->get();
        $partners     = Partner::where('is_active', 1)->get();
        $contact      = Contact::where('is_active', 1)->latest()->first();

        return view('page.frontend.home.index', compact(
            'hero',
            'social',
            'about',
            'services',
            'galeris',
            'testimonials',
            'partners',
            'contact'
        ));
    }
}
