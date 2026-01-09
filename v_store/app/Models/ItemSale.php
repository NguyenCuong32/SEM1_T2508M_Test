<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    protected $table = 'item_sale';

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'expired_date', // Đã sửa lỗi chính tả từ 'expried_date'
        'note',
    ];
}