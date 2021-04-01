<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
     * Get the Comments from User.
     */
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get Rates of Product
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    /**
     * Get OrderDetails contain the Product
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the Category of Product
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get Images of Product
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
