<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

# 1.4
Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');

# 1.3
Route::get('/items/create', [ItemSaleController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemSaleController::class, 'store'])->name('items.store');

# 1.5
Route::get('/items/edit/{id}', [ItemSaleController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [ItemSaleController::class, 'update'])->name('items.update');
