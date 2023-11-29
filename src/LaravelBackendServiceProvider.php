<?php

namespace Lianmaymesi\LaravelBackend;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackendServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/vendor/laravel-backend' => public_path('vendor/laravel-backend'),
            ], ['laravel-backend-assets', 'laravel-assets']);
        }

        $package
            ->name('laravel-backend')
            ->hasViews('lb');
    }
}
