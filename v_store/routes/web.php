<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('item_sale.index');
});

Route::resource('item_sale', \App\Http\Controllers\ItemSaleController::class);
