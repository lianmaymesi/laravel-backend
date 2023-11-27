<?php

namespace Lianmaymesi\LaravelBackend;

use Lianmaymesi\LaravelBackend\Commands\LaravelBackendCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackendServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-backend')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-backend_table')
            ->hasCommand(LaravelBackendCommand::class);
    }
}
