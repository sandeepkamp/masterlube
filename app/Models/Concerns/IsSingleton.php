<?php

namespace App\Models\Concerns;

trait IsSingleton
{
    public static function current(): static
    {
        return static::query()->firstOrCreate([]);
    }
}
