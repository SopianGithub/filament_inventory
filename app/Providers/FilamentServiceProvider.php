<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\PermissionsResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function() {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
            if(auth()->user()){
                if(auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['super-admin','admin', 'moderator'])){
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manage Users')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-users'),
                        UserMenuItem::make()
                            ->label('Manage Role')
                            ->url(RoleResource::getUrl())
                            ->icon('heroicon-s-cog'),
                        UserMenuItem::make()
                            ->label('Manage Permissions')
                            ->url(PermissionsResource::getUrl())
                            ->icon('heroicon-o-key')
                    ]);
                }
            }

            Filament::pushMeta([
                new HtmlString('<link rel="shortcut icon" type="image" href="/storage/assets/images/nugraha.svg" />')
            ]);
        });
    }
}
