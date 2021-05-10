<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Comment;

class CommentTest extends TestCase
{
    protected $comment;

    protected function setUp() : void
    {
        parent::setUp();
        $this->comment = new Comment();
    }

    protected function tearDown() : void
    {
        unset($this->comment);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('comments', $this->comment->getTable());
    }

    public function test_valid_guarded_properties()
    {
        $this->assertEquals([
            'id',
        ], $this->comment->getGuarded());
    }

    public function test_user_relation()
    {
        $relation = $this->comment->user();
        $this->test_belongsTo_relationship($relation, 'user_id', 'id');
    }

    public function test_product_relation()
    {
        $relation = $this->comment->product();
        $this->test_belongsTo_relationship($relation, 'product_id', 'id');
    }

    public function test_replies_relation()
    {
        $relation = $this->comment->replies();
        $this->test_hasMany_relationship($relation, 'parent_comment_id', 'id');
    }
}
