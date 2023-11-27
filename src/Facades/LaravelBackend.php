<?php

namespace Lianmaymesi\LaravelBackend\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lianmaymesi\LaravelBackend\LaravelBackend
 */
class LaravelBackend extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Lianmaymesi\LaravelBackend\LaravelBackend::class;
    }
}
