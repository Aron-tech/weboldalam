<?php

use App\Menu\MenuItem;

// Format: MenuItem::make('label', 'route', 'active_name', is_footer)

return [
    MenuItem::make('Kezdőlap', 'home'),
    MenuItem::make('Rólam', 'about', null, true),
    MenuItem::make('Projektek', 'projects.index', 'projects.*', true),
    MenuItem::make('Kapcsolat', 'contact', null, true),
];