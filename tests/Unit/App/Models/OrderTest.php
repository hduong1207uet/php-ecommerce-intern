<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;

class OrderTest extends TestCase
{
    protected $order;

    protected function setUp() : void
    {
        parent::setUp();
        $this->order = new Order();
    }

    protected function tearDown() : void
    {
        unset($this->order);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('orders', $this->order->getTable());
    }

    public function test_valid_guarded_properties()
    {
        $this->assertEquals([
            'id',
        ], $this->order->getGuarded());
    }

    public function test_orderDetails_relation()
    {
        $relation = $this->order->orderDetails();
        $this->test_hasMany_relationship($relation, 'order_id', 'id');
    }

    public function test_user_relation()
    {
        $relation = $this->order->user();
        $this->test_belongsTo_relationship($relation, 'user_id', 'id');
    }
}
