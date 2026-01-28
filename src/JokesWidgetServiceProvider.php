<?php

namespace SalmanAlmajali\JokesWidget;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class JokesWidgetServiceProvider extends PackageServiceProvider
{
    public static string $name = 'jokes-widget';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews()
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        Livewire::component('jokes-widget', JokesWidget::class);
    }
}
