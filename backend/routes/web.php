<?php

use App\Http\Controllers\ItemSaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('items', ItemSaleController::class);
