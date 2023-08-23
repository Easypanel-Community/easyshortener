<?php

namespace App\Providers;

use App\Settings\GeneralSettings;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use FilamentVersions\Facades\FilamentVersions;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            config(['filament.brand' => app(GeneralSettings::class)->site_name ?? env('APP_NAME')]);
        } catch (\Throwable $th) {
            // if this fails it's because the migration doesn't exist so it can be skipped
        }

        FilamentVersions::addItem('Easyshortener', 'v'.config('easyshortener.version'));

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Settings',
                'System',
                'Search',
            ]);

            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(route('profile.edit')),
            ]);

            Filament::registerNavigationItems([
                NavigationItem::make('Source Code')
                    ->url('https://github.com/easypanel-community/easyshortener', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-code')
                    ->sort(0)
                    ->group('Search'),
            ]);
        });
    }
}
