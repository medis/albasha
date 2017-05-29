<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['title', 'price', 'description', 'category', 'image', 'thumbnail'];

    /**
     * Get formatted price attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getPrice()
    {
        return '£' . number_format($this->price, 2);
    }

    public static function getCategories() {
        return [
            'soups' => 'SOUPS',
            'cold_starters' => 'COLD STARTERS',
            'hot_starters' => 'HOT STARTERS',
            'main_courses' => 'MAIN COURSES',
            'fish_meals' => 'FISH MEALS'
        ];
    }

    public static function getFood($category = null) {
        if (!empty($category)) {
            return Food::where('category', $category)->orderBy('weight')->get();
        }

        $data = [];
        foreach (self::getCategories() as $id => $category) {
            $results = Food::where('category', $id)->orderBy('weight')->get();
            if (!$results->isEmpty()) {
                $data[$category] = $results;
            }
        }

        return $data;
    }

    public static function getFoodGrouped() {
        $data = [];
    }
}
