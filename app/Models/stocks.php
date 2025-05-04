<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stocks extends Model
{
    /** @use HasFactory<\Database\Factories\StocksFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
