<?php

namespace Alghobary\LaravelMacros;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMacrosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-macros');
    }

    public function packageBooted()
    {
        // register macros
    }
}
