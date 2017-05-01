<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class PagesController extends Controller
{
    
    /**
     * Homepage callback.
     */
    public function index() {
        $slideshow = Gallery::where('slideshow', 1)->get();
        return view('pages.home', compact('slideshow'));
    }

    /**
     * About page.
     */
    public function about() {
        return view('pages.about');
    }

    /**
     * Menu page.
     */
    public function menu() {
        return view('pages.menu');
    }

    /**
     * Reservations page.
     */
    public function reservations() {
        return view('pages.reservations');
    }

}
