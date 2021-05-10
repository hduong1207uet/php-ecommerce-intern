<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;

class CategoryTest extends TestCase
{
    protected $category;

    protected function setUp() : void
    {
        parent::setUp();
        $this->category = new Category();
    }

    protected function tearDown() : void
    {
        unset($this->category);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('categories', $this->category->getTable());
    }

    public function test_valid_guarded_properties()
    {
        $this->assertEquals([
            'id',
        ], $this->category->getGuarded());
    }

    public function test_category_relation()
    {
        $relation = $this->category->products();
        $this->test_hasMany_relationship($relation, 'category_id', 'id');
    }
}
