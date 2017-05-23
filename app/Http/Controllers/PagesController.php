<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Food;

class PagesController extends Controller
{
    
    /**
     * Homepage callback.
     */
    public function index() {
        return view('pages.home');
    }

    /**
     * Menu page.
     */
    public function menu() {
        $menu = Food::getFood();
        return view('pages.menu', compact('menu'));
    }

    /**
     * Reservations page.
     */
    public function reservations() {
        return view('pages.reservations');
    }

}
