<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\SejarahFrontendController;

class SejarahFrontendController extends Controller
{
    //index
     public function index(){
    return view('page.frontend.sejarah.index');
}
}
