<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', [ItemSaleController::class, 'index'])->name('item_sale.index');
Route::get('/create', [ItemSaleController::class, 'create'])->name('item_sale.create');
Route::post('/store', [ItemSaleController::class, 'store'])->name('item_sale.store');
Route::get('/{id}/edit', [ItemSaleController::class, 'edit'])->name('item_sale.edit');
Route::put('/{id}', [ItemSaleController::class, 'update'])->name('item_sale.update');
Route::delete('/{id}', [ItemSaleController::class, 'destroy'])->name('item_sale.destroy');
