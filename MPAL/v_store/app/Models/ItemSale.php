<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    protected $table = 'item_sale';
    public $timestamps = false;

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'expried_date',
        'note'
    ];
}

