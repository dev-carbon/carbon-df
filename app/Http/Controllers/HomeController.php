<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $restaurants = Restaurant::orderBy('created_at', 'desc')->paginate(1);
        return view('home', [
            'restaurants' => $restaurants
        ]);
    }
}
