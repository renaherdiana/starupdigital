<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeFrontendController extends Controller
{
    // index
    public function index(){
        return view('page.frontend.home.index');
    }
}
