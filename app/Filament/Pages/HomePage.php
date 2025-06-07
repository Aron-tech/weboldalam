<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class HomePage extends BaseStaticPage
{
    protected static ?string $navigationLabel = 'Kezdőlap';
    protected static ?string $title = 'Kezdőlap tartalomkezelő';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected function getPageKey(): string {
        return 'home';
    }

    protected function defineForm(): array {
        return [
            Section::make('Tartalom')
                ->schema([
                    TextInput::make('title')
                        ->label('Kezdőlap cím')
                        ->required(),
                    TextInput::make('subtitle')
                        ->label('Kezdőlap alcím')
                        ->required(),
                ])->columns(2),
            Section::make('Mivel foglalkozom')
                ->schema([
                    Repeater::make('services')
                        ->label('Szolgáltatások')
                        ->schema([
                            TextInput::make('title')
                                ->label('Szolgáltatás neve')
                                ->required(),
                            FileUpload::make('svg')
                                ->label('Szolgáltatás ikonja')
                                ->disk('public')
                                ->directory('home')
                                ->maxSize(1024)
                                ->acceptedFileTypes(['image/svg+xml'])
                                ->loadingIndicatorPosition('left')
                                ->panelLayout('integrated')
                                ,
                        ])
                        ->addActionLabel('Új szolgáltatás hozzáadása')
                        ->grid(4),
                ])
        ];
    }
}
