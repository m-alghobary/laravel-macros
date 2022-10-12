<?php

namespace Alghobary\LaravelMacros;

use Alghobary\LaravelMacros\Commands\LaravelMacrosCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMacrosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-macros')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-macros_table')
            ->hasCommand(LaravelMacrosCommand::class);
    }
}
