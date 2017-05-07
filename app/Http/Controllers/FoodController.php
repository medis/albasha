<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\traits\FileTrait;

class FoodController extends Controller
{
    use FileTrait;

    protected $categories = [
        'soups' => 'SOUPS',
        'cold_starters' => 'COLD STARTERS',
        'hot_starters' => 'HOT STARTERS',
        'main_courses' => 'MAIN COURSES'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'soups' => Food::where('category', 'soups')->get(),
            'cold starters' => Food::where('category', 'cold_starters')->get(),
        ];

        return view('food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;
        return view('food.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric',
            'file'  => 'image|mimes:jpeg,jpg,png|max:10000'
        ]);

        list($public_path, $public_thumbnail_path) = $this->createFile($request->file, 'food', [90, 90]);
        Food::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $public_path,
            'thumbnail' => $public_thumbnail_path,
            'category' => $request->category,
        ]);

        return redirect()->route('food.index')->with('status', 'Food created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
