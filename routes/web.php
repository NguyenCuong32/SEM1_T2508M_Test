<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', [ItemSaleController::class, 'index']);
Route::resource('items', ItemSaleController::class);

