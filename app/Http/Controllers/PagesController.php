<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    /**
     * Homepage callback.
     */
    public function index() {
        return view('pages.home');
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
