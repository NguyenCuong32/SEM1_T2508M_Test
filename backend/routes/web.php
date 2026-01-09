<?php

use App\Http\Controllers\ItemsaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});
Route::resource('items', ItemsaleController::class);
