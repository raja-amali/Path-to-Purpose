<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the Home page.
     */
    public function create()
    {
        return view('home');
    }

}
