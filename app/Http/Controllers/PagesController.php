<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Food;
use App\Page;
use Auth;

class PagesController extends Controller
{
    
    /**
     * Homepage callback.
     */
    public function index() {
        $body = Page::where('machine_name', 'homepage_main_text')->first()->body;
        return view('pages.home', compact('body'));
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

    public function update(Request $request, $machine_name) {
        if (Auth::check()) {
            $page = Page::where('machine_name', $machine_name)->first();

            if ($page && $data = $request->get('data')) {
                $page->body = $data;
                $page->save();
                request()->session()->flash('status', 'Text updated');
            }
        }
    }

}
