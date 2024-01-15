<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRatingFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function show(Restaurant $restaurant, Dish $dish) {
        return view('dish.details', [
            'restaurant' => $restaurant,
            'dish' => $dish
        ]);
    }

    public function createRate(Restaurant $restaurant, Dish $dish) {
        return view('dish.rating', [
            'restaurant' => $restaurant,
            'dish' => $dish
        ]);
    }

    public function storeRate(DishRatingFormRequest $request) {
        dd($request->validated());
    }

    public function deleteRate(Dish $dish) {}
}
