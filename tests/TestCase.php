<?php

namespace Alghobary\LaravelMacros\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Alghobary\LaravelMacros\LaravelMacrosServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelMacrosServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //
    }
}
