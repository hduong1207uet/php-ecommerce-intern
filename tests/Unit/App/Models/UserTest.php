<?php

namespace Tests\Unit\App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp() : void
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown() : void
    {
        unset($this->user);
        parent::tearDown();
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_valid_fillable_properties()
    {
        $this->assertEquals([
            'name',
            'email',
            'password',
            'phone_number',
            'avatar',
        ], $this->user->getFillable());
    }

    public function test_valid_hidden_properties()
    {
        $this->assertEquals([
            'password',
            'remember_token',
        ], $this->user->getHidden());
    }

    public function test_valid_casts_properties()
    {
        $this->assertEquals([
            'email_verified_at' => 'datetime',
            'id' => 'int',
        ], $this->user->getCasts());
    }

    public function test_role_relation()
    {
        $relation = $this->user->role();
        $this->test_belongsTo_relationship($relation, 'role_id', 'id');
    }

    public function test_orders_relation()
    {
        $relation = $this->user->orders();
        $this->test_hasMany_relationship($relation, 'user_id', 'id');
    }

    public function test_comments_relation()
    {
        $relation = $this->user->comments();
        $this->test_hasMany_relationship($relation, 'user_id', 'id');
    }

    public function test_rates_relation()
    {
        $relation = $this->user->rates();
        $this->test_hasMany_relationship($relation, 'user_id', 'id');
    }
}
