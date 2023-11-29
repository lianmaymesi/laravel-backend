<?php

namespace Lianmaymesi\LaravelBackend;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
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
            ->hasViews('lb')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, thank you trying my package!');
                    })
                    ->publishAssets()
                    ->askToStarRepoOnGitHub('lianmaymesi/laravel-backend');
            });
    }
}
