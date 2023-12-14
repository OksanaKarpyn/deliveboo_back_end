<?php

use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TypologyController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TUTTI I RISTORANTI
Route::get("/apiRestaurant", [RestaurantController::class, "index"]);

// RISTORANTE SINGOLO
Route::get("/apiRestaurant/{id}", [RestaurantController::class, 'show']);

Route::get("/apiDish", [DishController::class, "index"]);
Route::get("/apiOrder", [OrderController::class, "index"]);
Route::get("/apiTypology", [TypologyController::class, "index"]);

Route::post("/orders", [OrderController::class, "create"]);