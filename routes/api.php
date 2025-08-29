<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("categories", [ApiController::class, "categories"]);
Route::post("category/store", [ApiController::class, "category_store"]);

Route::get("company", [CompanyController::class, "company"]);
Route::delete("company/delete/{id}", [CompanyController::class, "delete"]);
Route::post("company/store", [CompanyController::class, "store"]);


Route::get("trending/articles", [ApiController::class, "trending_articles"]);
Route::get("latest/articles", [ApiController::class, "latest_articles"]);

Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);

Route::post("logout", [AuthController::class, "logout"])->middleware('auth:sanctum');
