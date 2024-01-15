<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('created_at', 'desc')->paginate(42);
        return view('admin.restaurant.index', [
            'title' => 'Restaurants',
            'restaurants' => $restaurants
        ]);
    }

    public function create()
    {
        $restaurant = new Restaurant();
        $restaurant->fill([
            'name' => 'Carbon restaurant',
            'speciality' => 'Bean & Steaks',
            'phone' => '+4200000000',
            'street' => '42 carbon street',
            'postal_code' => '21000',
            'city' => 'Carbon city',
            'description' => 'Hello Carbon Restaurant',
        ]);
        
        return view('admin.restaurant.form', [
            'restaurant' => $restaurant,
        ]);
    }

    public function store(RestaurantFormRequest $request)
    {
        $restaurant = new Restaurant();
        $restaurant->user_id = auth()->user()->id;
        $restaurant->name = $request->name;
        $restaurant->speciality = $request->speciality;
        $restaurant->phone = $request->phone;
        $restaurant->street = $request->street;
        $restaurant->postal_code = $request->postal_code;
        $restaurant->city = $request->city;
        $restaurant->description = $request->description;
        $restaurant->slug = \Illuminate\Support\Str::slug($request->name);
        $restaurant->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images/restaurants', 'public');
                $restaurantImage = new \App\Models\RestaurantImage();
                $restaurantImage->restaurant_id = $restaurant->id;
                $restaurantImage->image_path = $filename;
                $restaurantImage->save();
            }
        }
        return redirect()->route('admin.restaurant.index')->with('success', 'Restaurant ajouté');
    }

    public function show(Restaurant $restaurant) {
        $restaurant->dishes = Dish::orderBy('created_at', 'desc')->paginate(42);
        return view('admin.restaurant.manage', [
            'restaurant' => $restaurant
        ]);
    }

    public function edit(Restaurant $restaurant)
    {        
        return view('admin.restaurant.form', [
            'restaurant' => $restaurant,
        ]);
    }

    public function update(RestaurantFormRequest $request, Restaurant $restaurant)
    {
        $restaurant->name = $request->name;
        $restaurant->speciality = $request->speciality;
        $restaurant->phone = $request->phone;
        $restaurant->street = $request->street;
        $restaurant->postal_code = $request->postal_code;
        $restaurant->city = $request->city;
        $restaurant->description = $request->description;
        $restaurant->slug = \Illuminate\Support\Str::slug($request->name);
        $restaurant->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('public/restaurants', 'public');
                $restaurantImage = new \App\Models\RestaurantImage();
                $restaurantImage->restaurant_id = $restaurant->id;
                $restaurantImage->image_path = $filename;
                $restaurantImage->save();
            }
        }
        return redirect()->route('admin.restaurant.index')->with('success', 'Restaurant modifé');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('admin.restaurant.index')->with('success', 'Restaurant supprimé');
    }
}
