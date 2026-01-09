<?php
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

// Trang danh sách (Câu 1.4)
Route::get('/', [ItemController::class, 'index'])->name('items.index');

// Các route cho Thêm và Sửa (Câu 1.3, 1.5)
Route::resource('items', ItemController::class);