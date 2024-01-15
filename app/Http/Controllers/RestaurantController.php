<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\RestaurantFormRequest;
use App\Http\Requests\RestaurantRatingFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\RestaurantRating;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show(Restaurant $restaurant)
    {
        $restaurant->dishes = Dish::all();
        return view('restaurant.details', ['restaurant' => $restaurant]);
    }

    public function createRate(Restaurant $restaurant)
    {
        return view('restaurant.rating', ['restaurant' => $restaurant]);
    }

    public function storeRate(RestaurantRatingFormRequest $request, Restaurant $restaurant)
    {
        $rating = new \App\Models\RestaurantRating();
        $rating->restaurant_id = $restaurant->id;
        $rating->user_id = auth()->user()->id;
        $rating->note = $request->note;
        $rating->comment = $request->comment;
        $rating->save();
        return redirect()->route('restaurant.show', ['restaurant' => $restaurant])->with('success', 'Votre avis à été enregitré');
    }

    public function deleteRate(Restaurant $restaurant, RestaurantRating $rating)
    {
        $rating->delete();
        return redirect()->route('restaurant.show', ['restaurant' => $restaurant])->with('success', 'Votre avis à été supprimé');
    }

    public function contact(Request $request, Restaurant $restaurant)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'object' => 'required',
                'message' => 'required'
            ]);

            $contact = new \App\Models\Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->object = $request->object;
            $contact->message = $request->message;
            $contact->restaurant_id = $restaurant->id;
            $contact->save();

            // TODO: Send email
            return redirect()->route('restaurant.show', ['restaurant' => $restaurant])->with('success', 'Votre message a bien été envoyé');
        }
        return view('restaurant.contact', ['restaurant' => $restaurant]);
    }
}
