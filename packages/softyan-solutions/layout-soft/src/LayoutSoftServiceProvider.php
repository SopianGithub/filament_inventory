<?php

namespace SoftyanSolutions\LayoutSoft;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class LayoutSoftServiceProvider extends PluginServiceProvider
{
    public static string $name = 'layout-soft';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasViews();
    }

}
