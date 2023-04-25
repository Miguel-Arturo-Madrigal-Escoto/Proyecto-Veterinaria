<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        // Gate
        // show home if user isn't authenticated, else go to dashboard
        return view('home.index');
    }
}
