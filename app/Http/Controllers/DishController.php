<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRatingFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;

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

    public function storeRate(DishRatingFormRequest $request, Restaurant $restaurant, Dish $dish) {
        $rating = new \App\Models\DishRating();
        $rating->user_id = auth()->user()->id;
        $rating->note = $request->note;
        $rating->comment = $request->comment;
        $rating->dish_id = $dish->id;
        $rating->save();
        return redirect()->route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug])->with('success', 'Votre avis a bien été enregistrée');
    }

    public function deleteRate(Dish $dish) {}
}
