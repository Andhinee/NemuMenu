<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\UlasanController;

// USER_NEMUMENU
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// RESTORAN
Route::get('/restoran', [RestoranController::class, 'index']);
Route::get('/restoran/{id}', [RestoranController::class, 'show']);
Route::post('/restoran', [RestoranController::class, 'store']);
Route::put('/restoran/{id}', [RestoranController::class, 'update']);
Route::delete('/restoran/{id}', [RestoranController::class, 'destroy']);

// MENU
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::post('/menu', [MenuController::class, 'store']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

// FAVORIT
Route::get('/favorit', [FavoritController::class, 'index']);
Route::get('/favorit/{id}', [FavoritController::class, 'show']);
Route::post('/favorit', [FavoritController::class, 'store']);
Route::put('/favorit/{id}', [FavoritController::class, 'update']);
Route::delete('/favorit/{id}', [FavoritController::class, 'destroy']);

// ULASAN
Route::get('/ulasan', [UlasanController::class, 'index']);
Route::get('/ulasan/{id}', [UlasanController::class, 'show']);
Route::post('/ulasan', [UlasanController::class, 'store']);
Route::put('/ulasan/{id}', [UlasanController::class, 'update']);
Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy']);
