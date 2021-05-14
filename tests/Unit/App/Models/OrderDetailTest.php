<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderDetail;

class OrderDetailTest extends TestCase
{
    protected $orderDetail;

    protected function setUp() : void
    {
        parent::setUp();
        $this->orderDetail = new OrderDetail();
    }

    protected function tearDown() : void
    {
        unset($this->orderDetail);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('order_details', $this->orderDetail->getTable());
    }

    public function test_valid_guarded_properties()
    {
        $this->assertEquals([
            'id',
        ], $this->orderDetail->getGuarded());
    }

    public function test_order_relation()
    {
        $relation = $this->orderDetail->order();
        $this->test_belongsTo_relationship($relation, 'order_id', 'id');
    }

    public function test_product_relation()
    {
        $relation = $this->orderDetail->product();
        $this->test_belongsTo_relationship($relation, 'product_id', 'id');
    }
}
