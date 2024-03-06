<?php

namespace Lianmaymesi\LaravelBackend;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackendServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/vendor/laravel-backend' => public_path('vendor/laravel-backend'),
            ], ['laravel-backend-assets']);

            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('external'),
            ], ['laravel-backend-external-assets']);
        }

        $package
            ->name('laravel-backend')
            ->hasViews('lb');
    }
}
