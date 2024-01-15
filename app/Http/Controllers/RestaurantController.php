<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\RestaurantFormRequest;
use App\Http\Requests\RestaurantRatingFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show(Restaurant $restaurant) {
        $restaurant->dishes = Dish::all();
        return view('restaurant.details', ['restaurant' => $restaurant]);
    }

    public function createRate(Restaurant $restaurant) {
        return view('restaurant.rating', ['restaurant' => $restaurant]);
    }

    public function storeRate(RestaurantRatingFormRequest $request, Restaurant $restaurant) {
        $rating = new \App\Models\RestaurantRating();
        $rating->restaurant_id = $restaurant->id;
        $rating->note = $request->note;
        $rating->comment = $request->comment;
        $rating->save();
        return redirect()->route('restaurant.show', ['restaurant' => $restaurant])->with('success', 'Votre avis à été enregitré');
    }

    public function deleteRate(Restaurant $restaurant) {}
}
