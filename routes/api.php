<?php

use Illuminate\Http\Request;

use App\Food;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/food', function(Request $request) {
    return Food::getFood();
});

Route::post('/food', function(Request $request) {
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
})->name('api_food_store_weight');