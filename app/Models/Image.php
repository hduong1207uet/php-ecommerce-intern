<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'asset_uri',
    ];

    /**
     * Get parent's Product ID
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
