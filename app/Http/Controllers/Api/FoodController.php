<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;

class FoodController extends Controller
{

    public function index() {
        return Food::getFood();
    }

    public function store(Request $request) {
        foreach (json_decode($request->data) as $item) {
            if (!isset($item->id) || !is_numeric($item->id) ||
                !isset($item->weight) || !is_numeric($item->weight)) {
                throw new Exception('Invalid data');
                return ['error'];
            }

            $food = Food::find($item->id);
            if ($food) {
                $food->weight = $item->weight;
                $food->save();
            }
        }
    }

}