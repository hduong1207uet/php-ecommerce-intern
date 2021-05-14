<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class ProductTest extends TestCase
{
    protected $product;

    protected function setUp() : void
    {
        parent::setUp();
        $this->product = new Product();
    }

    protected function tearDown() : void
    {
        unset($this->product);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('products', $this->product->getTable());
    }

    public function test_valid_guarded_properties()
    {
        $this->assertEquals([
            'id',
        ], $this->product->getGuarded());
    }

    public function test_comments_relation()
    {
        $relation = $this->product->comments();
        $this->test_hasMany_relationship($relation, 'product_id', 'id');
    }

    public function test_rates_relation()
    {
        $relation = $this->product->rates();
        $this->test_hasMany_relationship($relation, 'product_id', 'id');
    }

    public function test_orderDetails_relation()
    {
        $relation = $this->product->orderDetails();
        $this->test_hasMany_relationship($relation, 'product_id', 'id');
    }

    public function test_category_relation()
    {
        $relation = $this->product->category();
        $this->test_belongsTo_relationship($relation, 'category_id', 'id');
    }

    public function test_images_relation()
    {
        $relation = $this->product->images();
        $this->test_hasMany_relationship($relation, 'product_id', 'id');
    }
}
