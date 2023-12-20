<?php

namespace Areeb\EmailService;

use Areeb\EmailService\Classes\Config;
use Areeb\EmailService\Contracts\EmailService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EmailServiceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('email-service')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        $this->app->register(EmailServiceEventServiceProvider::class);
        $this->app->bind(EmailService::class, Config::get('service_class'));
    }

}
