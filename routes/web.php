<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'attemptLogin'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('restaurant')->name('restaurant.')->group(function () {
    Route::get('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'show'])->name('show');
    Route::get('/{restaurant}/rate', [\App\Http\Controllers\RestaurantController::class, 'createRate'])->middleware('auth')->name('rating.create');
    Route::post('/{restaurant}/rate', [\App\Http\Controllers\RestaurantController::class, 'storeRate'])->middleware('auth')->name('rating.store');
    Route::get('/{restaurant}/dish/{dish}-{slug}', [\App\Http\Controllers\DishController::class, 'show'])->middleware('auth')->name('dish.show');
    Route::get('/{restaurant}/dish/{dish}-{slug}/rate', [\App\Http\Controllers\DishController::class, 'createRate'])->middleware('auth')->name('dish.rating.create');
    Route::post('/{restaurant}/dish/{dish}-{slug}/rate', [\App\Http\Controllers\DishController::class, 'storeRate'])->middleware('auth')->name('dish.rating.store');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('restaurant', App\Http\Controllers\Admin\RestaurantController::class);
    Route::prefix('restaurant')->name('restaurant.')->group(function () {
        Route::get('{restaurant}/dish', [App\Http\Controllers\Admin\DishController::class, 'create'])->name('dish.create');
        Route::post('{restaurant}/dish', [App\Http\Controllers\Admin\DishController::class, 'store'])->name('dish.store');
        Route::get('{restaurant}/dish/{dish}/edit', [App\Http\Controllers\Admin\DishController::class, 'edit'])->name('dish.edit');
        Route::put('{restaurant}/dish/{dish}', [App\Http\Controllers\Admin\DishController::class, 'update'])->name('dish.update');
        Route::delete('{restaurant}/dish/{dish}', [App\Http\Controllers\Admin\DishController::class, 'destroy'])->name('dish.destroy');
    });
});
