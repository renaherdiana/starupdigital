<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenagakerjaFrontendController extends Controller
{
    // index
    public function index()
    {
        return view('page.frontend.tenagakerja.index');
    }
}
