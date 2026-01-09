<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;


Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');
Route::post('/', [ItemSaleController::class, 'store'])->name('items.store');
Route::get('/{item}/edit', [ItemSaleController::class, 'edit'])->name('items.edit');
Route::put('/{item}', [ItemSaleController::class, 'update'])->name('items.update');
