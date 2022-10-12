<?php

namespace Alghobary\LaravelMacros\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alghobary\LaravelMacros\LaravelMacros
 */
class LaravelMacros extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Alghobary\LaravelMacros\LaravelMacros::class;
    }
}
