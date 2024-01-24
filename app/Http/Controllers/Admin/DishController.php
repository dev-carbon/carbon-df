<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DishFormRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function create(Restaurant $restaurant)
    {
        $dish = new Dish();
        $dish->fill([
            'name' => 'Carbon fried beans',
            'price' => 42,
            'description' => 'lorem ipsum dolor sit amet',
        ]);
        return view('admin.restaurant.dish.form', [
            'restaurant' => $restaurant,
            'dish' => $dish,
        ]);
    }

    public function store(DishFormRequest $request, Restaurant $restaurant)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->restaurant_id = $restaurant->id;
        $dish->slug = \Illuminate\Support\Str::slug($request->name);
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images/dishes', 'public');
                $dishImage = new \App\Models\DishImage();
                $dishImage->dish_id = $dish->id;
                $dishImage->image_path = $filename;
                $dishImage->save();
            }
        }
        return redirect()->route('admin.restaurant.show', ['restaurant' => $restaurant])->with('success', 'Plat ajouté.');
    }

    public function edit(Restaurant $restaurant, Dish $dish)
    {
        return view('admin.restaurant.dish.form', [
            'dish' => $dish,
            'restaurant' => $restaurant,
        ]);
    }

    public function update(DishFormRequest $request, Restaurant $restaurant, Dish $dish)
    {
        $dish->name = $request->name;
        $dish->slug = \Illuminate\Support\Str::slug($request->name);
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images/dishes', 'public');
                $dishImage = new \App\Models\DishImage();
                $dishImage->dish_id = $dish->id;
                $dishImage->image_path = $filename;
                $dishImage->save();
            }
        }
        return redirect()->route('admin.restaurant.show', ['restaurant' => $restaurant])->with('success', 'Plat modifié.');
    }

    public function destroy(Restaurant $restaurant, Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.restaurant.show', ['restaurant' => $restaurant])->with('success', 'Plat supprimé.');
    }
}
