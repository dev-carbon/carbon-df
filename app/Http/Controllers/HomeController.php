<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        
        $latestRestaurants = Restaurant::latest()->paginate(5);
        $trendingrestaurants = Restaurant::where('trending', '=', 1)->paginate(5);
        // $ratedRestaurant = Restaurant::where('rated', '=', 1)->paginate(5);
        
        return view('home', [
            'latestRestaurants' => $latestRestaurants,
            'trendingRestaurants' => $trendingrestaurants,
            // 'ratedRestaurant' => $ratedRestaurant
        ]);
    }

    public function aboutUs() {
        return view('about-us');
    }
}
