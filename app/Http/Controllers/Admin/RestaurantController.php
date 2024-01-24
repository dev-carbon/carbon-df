<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Speciality;
use App\Models\User;
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
        $specialities = Speciality::all();
        $restaurant->fill([
            'name' => 'Carbon restaurant',
            'phone' => '+4200000000',
            'street' => '42 carbon street',
            'postal_code' => '21000',
            'city' => 'Carbon city',
            'description' => 'Hello Carbon Restaurant',
        ]);

        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('name', ['admin', 'manager', 'user']);
        })->get();
                
        return view('admin.restaurant.form', [
            'restaurant' => $restaurant,
            'users' => $users,
            'specialities' => $specialities
        ]);
    }

    public function store(RestaurantFormRequest $request)
    {
        $restaurant = new Restaurant();
        $restaurant->owner_id = $request->owner;
        $restaurant->name = $request->name;
        $restaurant->speciality_id = $request->speciality;
        $restaurant->phone = $request->phone;
        $restaurant->street = $request->street;
        $restaurant->postal_code = $request->postal_code;
        $restaurant->city = $request->city;
        $restaurant->description = $request->description;
        $restaurant->slug = \Illuminate\Support\Str::slug($request->name);
        $restaurant->trending = $request->trending ? 1 : 0;
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
        $specialities = Speciality::all();
        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('name', ['admin', 'manager', 'user']);
        })->get();
        return view('admin.restaurant.form', [
            'specialities' => $specialities,
            'restaurant' => $restaurant,
            'users' => $users,
        ]);
    }

    public function update(RestaurantFormRequest $request, Restaurant $restaurant)
    {
        $restaurant->name = $request->name;
        $restaurant->owner_id = $request->owner;
        $restaurant->speciality_id = $request->speciality;
        $restaurant->phone = $request->phone;
        $restaurant->street = $request->street;
        $restaurant->postal_code = $request->postal_code;
        $restaurant->city = $request->city;
        $restaurant->description = $request->description;
        $restaurant->slug = \Illuminate\Support\Str::slug($request->name);
        $restaurant->trending = $request->trending ? 1 : 0;
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
