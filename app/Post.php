<?php

namespace App;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\Ghost\Posts with(array $include)
 * @method static \App\Services\Ghost\Posts select(array $fields)
 * @method static \Illuminate\Support\Collection get(array $fields = [])
 */
class Post extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::class;
    }
}