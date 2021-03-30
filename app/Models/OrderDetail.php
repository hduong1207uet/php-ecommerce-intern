<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Get Order ID
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get Product's ID of OrderDetail
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
