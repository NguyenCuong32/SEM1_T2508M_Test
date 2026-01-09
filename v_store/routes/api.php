<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemSaleController;

Route::get('/items', [ItemSaleController::class, 'index']);
Route::post('/items', [ItemSaleController::class, 'store']);
Route::put('/items/{id}', [ItemSaleController::class, 'update']);
