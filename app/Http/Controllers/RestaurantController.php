<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show(Restaurant $restaurant) {
        $restaurant->dishes = Dish::all();
        return view('restaurant.details', ['restaurant' => $restaurant]);
    }

    public function rate(Restaurant $restaurant) {}

    public function storeRate(Restaurant $restaurant) {}

    public function deleteRate(Restaurant $restaurant) {}
}
