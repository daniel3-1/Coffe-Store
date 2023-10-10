<?php

use App\Http\Controllers\ClienteController;
use App\Models\Consumidores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos', [ClienteController::class, 'index']);
Route::post('productos', [ClienteController::class, 'store']);
Route::get('productos/{id}', [ClienteController::class, 'show']);
Route::get('productos/{id}/edit', [ClienteController::class, 'edit']);
Route::put('productos/{id}/edit', [ClienteController::class, 'update']);
Route::delete('productos/{id}/delete', [ClienteController::class, 'destroy']);
