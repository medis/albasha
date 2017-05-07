<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['title', 'price', 'description', 'category', 'image', 'thumbnail'];

    public static function getCategories() {
        return [
            'soups' => 'SOUPS',
            'cold_starters' => 'COLD STARTERS',
            'hot_starters' => 'HOT STARTERS',
            'main_courses' => 'MAIN COURSES'
        ];
    }

    public static function getFood($category = null) {
        if (!empty($category)) {
            return [$category => Food::where('category', $category)->get()];
        }

        $data = [];
        foreach (self::getCategories() as $id => $category) {
            $results = Food::where('category', $id)->get();
            if (!$results->isEmpty()) {
                $data[$category] = $results;
            }
        }

        return $data;
    }
}
