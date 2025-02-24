<?php

use App\Models\StaticContent;

if (!function_exists('get_static_content')) {
    function get_static_content(string $page, string $key, string $default = ''): string {
        return StaticContent::where('page', $page)->where('key', $key)->value('value') ?? $default;
    }
}
