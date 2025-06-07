<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
        {
            $settings = cache()->remember('settings', 1440, function () {
                return getSettingsContent();
            });

            $views_with_settings = [
                'layouts.app',
                'components.navigation.footer',
                'contact',
            ];

            View::composer($views_with_settings, function ($view) use ($settings) {
                $view->with('settings', $settings);
            });
        }
}
