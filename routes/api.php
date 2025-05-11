<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\UserNemumenuController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\UlasanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ✅ AUTH
Route::post('/login', [LoginController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// ✅ USER_NEMUMENU
Route::get('/users', [UserNemumenuController::class, 'index']);
Route::get('/users/{id}', [UserNemumenuController::class, 'show']);
Route::post('/users', [UserNemumenuController::class, 'store']);
Route::put('/users/{id}', [UserNemumenuController::class, 'update']);
Route::delete('/users/{id}', [UserNemumenuController::class, 'destroy']);

// ✅ RESTORAN
Route::get('/restoran', [RestoranController::class, 'index']);
Route::get('/restoran/{resto_id}', [RestoranController::class, 'show']);
Route::post('/restoran', [RestoranController::class, 'store']);
Route::put('/restoran/{id}', [RestoranController::class, 'update']);
Route::delete('/restoran/{id}', [RestoranController::class, 'destroy']);
Route::get('/restoran/new', [RestoranController::class, 'getNewRestaurants']);
Route::get('/restoran/area/{area}', [RestoranController::class, 'getByArea']);
Route::get('/restoran/menu/{menuType}', [RestoranController::class, 'getByMenu']);

// ✅ MENU
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::post('/menu', [MenuController::class, 'store']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

// ✅ FAVORIT (dengan dan tanpa auth)
Route::get('/favorit', [FavoritController::class, 'index']);
Route::get('/favorit/{id}', [FavoritController::class, 'show']);
Route::post('/favorit', [FavoritController::class, 'store']);
Route::put('/favorit/{id}', [FavoritController::class, 'update']);
Route::delete('/favorit/{id}', [FavoritController::class, 'destroy']);

// Extra fitur favorit dengan auth
Route::middleware('auth:api')->group(function () {
    Route::get('/favorites', [RestoranController::class, 'getFavorites']);
    Route::post('/favorites/{resto_id}', [RestoranController::class, 'addFavorite']);
    Route::delete('/favorites/{resto_id}', [RestoranController::class, 'removeFavorite']);
});

// ✅ ULASAN
Route::get('/ulasan', [UlasanController::class, 'index']);
Route::get('/ulasan/{id}', [UlasanController::class, 'show']);
Route::post('/ulasan', [UlasanController::class, 'store']);
Route::put('/ulasan/{id}', [UlasanController::class, 'update']);
Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy']);

// ✅ PROFILE USER YANG LOGIN
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
