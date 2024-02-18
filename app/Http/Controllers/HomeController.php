<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index() : View {
        return view('home.index');
    }
}
