<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    use HasFactory;

    protected $table = 'item_sale'; // Requirement specified 'item_sale'
    public $timestamps = false; // Schema didn't mention timestamps

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'unit',
        'product_date',
        'expried_date',
        'note',
    ];
}
