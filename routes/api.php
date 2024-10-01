<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

use Laravel\Passport\Http\Controllers\AccessTokenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('personas', PersonaController::class);


Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);