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

Route::get('/instagram/{page?}', function(Request $request, $page = null) {
    //http://hootlex.github.io/vuejs-paginator/
    $data = [
        [
            'id' => 1,
            'name' => "1"
        ],
        [
            'id' => 2,
            'name' => "2"
        ],
        [
            'id' => 3,
            'name' => "3"
        ]
    ];
    $limit = 2;
    $page = $page ?: 1;
    $total = count( $data );
    $totalPages = ceil( $total/ $limit );
    $collection = collect($data);
    $items = $collection->forPage($page, $limit);
    return [
        'current_page' => $page,
        'next_page_url' => $page < $totalPages ? sprintf('/api/instagram/%d', $page + 1) : null,
        'last_page' => $totalPages,
        'prev_page_url' => $page > 1 ? sprintf('/api/instagram/%d', $page - 1) : null,
        'items' => $items->toArray()
    ];
});