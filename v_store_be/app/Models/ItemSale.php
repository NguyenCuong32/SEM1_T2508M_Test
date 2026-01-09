<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemSale extends Model
{

    use HasFactory;
    protected $table = 'item_sale';

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'expired_date',
        'note'
    ];
}
