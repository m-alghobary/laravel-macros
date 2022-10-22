<?php

namespace Alghobary\LaravelMacros;

use Spatie\LaravelPackageTools\Package;
use Alghobary\LaravelMacros\Macros\BuilderMacros;
use Alghobary\LaravelMacros\Macros\CollectionMacros;
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
        CollectionMacros::register();
        BuilderMacros::register();
    }
}
