<?php

namespace App\Menu;

class MenuItem
{
    public string $label;
    public string $route;
    public bool $is_footer;
    public ?string $active_name;

    public function __construct(string $label, string $route, ?string $active_name = null, bool $is_footer = false)
    {
        $this->label = $label;
        $this->route = $route;
        $this->active_name = $active_name ?? $route;
        $this->is_footer = $is_footer;
    }

    public static function make(string $label, string $route, ?string $active_name = null, bool $is_footer = false): self
    {
        return new self($label, $route, $active_name, $is_footer);
    }
    public function isActive(): bool
    {
        return str(request()->route()->getName())->is($this->active_name);
    }
}