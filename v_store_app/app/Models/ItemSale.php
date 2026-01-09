<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    protected $table = 'item_sale';
    protected $fillable = ['item_code' , 'item_name','quantity','expired_date','note'];
    public $timestamps = false;
    protected $casts = [
    'expired_date' => 'date:d/m/Y',
];

}
