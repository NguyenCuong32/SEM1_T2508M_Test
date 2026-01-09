<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');

Route::get('/items/create', [ItemSaleController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemSaleController::class, 'store'])->name('items.store');

Route::get('/items/edit/{id}', [ItemSaleController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [ItemSaleController::class, 'update'])->name('items.update');
