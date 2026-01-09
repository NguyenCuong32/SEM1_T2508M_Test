<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', [ItemSaleController::class, 'index']);
Route::get('/add', [ItemSaleController::class, 'create']);
Route::post('/add', [ItemSaleController::class, 'store']);
Route::get('/edit/{id}', [ItemSaleController::class, 'edit']);
Route::post('/update/{id}', [ItemSaleController::class, 'update']);