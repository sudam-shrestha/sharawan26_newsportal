<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("categories", [ApiController::class, "categories"]);
Route::get("company", [ApiController::class, "company"]);
Route::get("trending/articles", [ApiController::class, "trending_articles"]);
Route::get("latest/articles", [ApiController::class, "latest_articles"]);

