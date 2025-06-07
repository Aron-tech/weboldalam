<?php

use App\Models\StaticContent;

if (!function_exists('getSettingsContent')) {
    function getSettingsContent($keys = null) {
        return StaticContent::where('page', 'general-settings')
            ->when($keys, function ($query) use ($keys) {
                return $query->whereIn('key', $keys);
            })
            ->pluck('value', 'key');
    }
}

if (!function_exists('menu_items')) {
    function menu_items(): array
    {
        return require base_path('routes/menu.php');
    }
}
