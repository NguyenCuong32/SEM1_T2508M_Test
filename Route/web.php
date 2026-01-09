<?php

use App\Http\Controller\ItemSaleController

Route::get('/',[ItemSaleController::class,'index'])->name('item_sale.index');
Route::get('/item_sale/create',[ItemSaleController::class,'create'])->name('item_sale.create');
Route::post('/item_sale',[ItemSaleController::class,'store'])->name('item_sale.store');
route::get('/item_sale/{item_sale}/edit',[ItemSaleController::class,'edit'])->name("item_sale.edit");
route::put('/item_sale/{item_sale}',[ItemSaleController::class,'update'])->name('item_sale.update');