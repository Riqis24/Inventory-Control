<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'name',
        'measurement_id',
        'is_stockable',
    ];

    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }

    public function measurements()
    {
        return $this->belongsToMany(Measurement::class, 'product_measurements');
    }

    public function stock()
    {
        return $this->hasOne(stocks::class)->where('quantity', '>', 0);
    }

}
