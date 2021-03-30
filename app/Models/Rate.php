<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
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
     * Get the User vote this Rate
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Product contain Vote
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
