<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BukuAPI;

use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::apiResource('buku', BukuAPI::class);
