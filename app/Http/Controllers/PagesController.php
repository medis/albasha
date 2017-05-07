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
        $gallery = Gallery::paginate(8);
        return view('pages.home', compact('gallery'));
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
