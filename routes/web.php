<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');

Route::get('/restaurants', [\App\Http\Controllers\RestaurantController::class, 'list'])->name('restaurant.list'); 
    
Route::get('/trending', [\App\Http\Controllers\RestaurantController::class, 'trending'])->name('restaurant.trending');


// Restaurant routes
Route::prefix('restaurant')->name('restaurant.')->group(function () {
    Route::get('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'show'])->name('show');
       
    Route::match(['get', 'post'], '/{restaurant}/contact', [\App\Http\Controllers\RestaurantController::class, 'contact'])->name('contact');
    
    Route::get('/{restaurant}/rate', [\App\Http\Controllers\RestaurantController::class, 'createRate'])->middleware('auth')->name('rating.create');
    Route::post('/{restaurant}/rate', [\App\Http\Controllers\RestaurantController::class, 'storeRate'])->middleware('auth')->name('rating.store');
    Route::delete('/{restaurant}/rate/{rating}', [\App\Http\Controllers\RestaurantController::class, 'deleteRate'])->middleware('auth')->name('rating.destroy');
    Route::get('/{restaurant}/dish/{dish}-{slug}', [\App\Http\Controllers\DishController::class, 'show'])->middleware('auth')->name('dish.show');
    Route::get('/{restaurant}/dish/{dish}-{slug}/rate', [\App\Http\Controllers\DishController::class, 'createRate'])->middleware('auth')->name('dish.rating.create');
    Route::post('/{restaurant}/dish/{dish}-{slug}/rate', [\App\Http\Controllers\DishController::class, 'storeRate'])->middleware('auth')->name('dish.rating.store');
    Route::delete('/{restaurant}/dish/{dish}-{slug}/rate/{rating}', [\App\Http\Controllers\DishController::class, 'deleteRate'])->middleware('auth')->name('dish.rating.destroy');
});


// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin|manager'])->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('speciality', App\Http\Controllers\Admin\SpecialityController::class);
    Route::resource('restaurant', App\Http\Controllers\Admin\RestaurantController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/role-permission', [\App\Http\Controllers\Admin\RolePermissionController::class, 'index'])->name('role.permission');
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission', App\Http\Controllers\Admin\PermissionController::class);
    Route::prefix('restaurant')->name('restaurant.')->group(function () {
        Route::get('{restaurant}/dish', [App\Http\Controllers\Admin\DishController::class, 'create'])->name('dish.create');
        Route::post('{restaurant}/dish', [App\Http\Controllers\Admin\DishController::class, 'store'])->name('dish.store');
        Route::get('{restaurant}/dish/{dish}/edit', [App\Http\Controllers\Admin\DishController::class, 'edit'])->name('dish.edit');
        Route::put('{restaurant}/dish/{dish}', [App\Http\Controllers\Admin\DishController::class, 'update'])->name('dish.update');
        Route::delete('{restaurant}/dish/{dish}', [App\Http\Controllers\Admin\DishController::class, 'destroy'])->name('dish.destroy');
    });
});



// Breeze routes
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
