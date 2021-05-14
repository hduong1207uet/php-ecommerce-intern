<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function test_hasMany_relationship($relation, $foreignKeyName, $localKeyName)
    {
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals($foreignKeyName, $relation->getForeignKeyName());
        $this->assertEquals($localKeyName, $relation->getLocalKeyName());
    }

    protected function test_belongsTo_relationship($relation, $foreignKeyName, $ownerKeyName)
    {
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals($foreignKeyName, $relation->getForeignKeyName());
        $this->assertEquals($ownerKeyName, $relation->getOwnerKeyName());
    }
}
