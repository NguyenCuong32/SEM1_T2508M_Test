<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itemsale extends Model
{
    protected $table = 'itemsales';
    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'expried_date',
        'note',
    ];
}
