<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRatingFormRequest;
use App\Models\Dish;
use App\Models\DishRating;
use App\Models\Restaurant;
use Illuminate\Http\Client\Request;

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

    public function deleteRate(Restaurant $restaurant, Dish $dish, string $slug, DishRating $rating) {
        $rating->delete();
        return redirect()->route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish,'slug' => $dish->slug])->with('success', 'Votre avis a bien été supprimée');
    }
}
