<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemSaleController;

Route::get('/test', function () {
    return response()->json(['ok' => true]);
});
Route::get('/items', [ItemSaleController::class, 'index']);
Route::post('/items', [ItemSaleController::class, 'store']);
Route::put('/items/{id}', [ItemSaleController::class, 'update']);
Route::delete('/items/{id}', [ItemSaleController::class, 'destroy']);
