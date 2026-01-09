<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('items.index');
    });

    Route::resource('items', ItemSaleController::class);

    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'vi'])) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    })->name('lang.switch');

});
