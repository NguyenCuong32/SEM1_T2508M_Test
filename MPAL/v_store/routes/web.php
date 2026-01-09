<?php

use App\Http\Controllers\ItemSaleController;

Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemSaleController::class, 'create'])->name('items.create');
Route::post('/items', [ItemSaleController::class, 'store'])->name('items.store');
Route::get('/items/{id}/edit', [ItemSaleController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemSaleController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [ItemSaleController::class, 'destroy'])
    ->name('items.destroy');
    Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');

