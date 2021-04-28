<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
     * Get User of Comment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Product contain Comment
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the Comment's replies
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
}
