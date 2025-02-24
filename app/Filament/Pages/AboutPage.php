<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class AboutPage extends BaseStaticPage {
    protected static ?string $navigationLabel = 'Rólam';
    protected static ?string $title = 'Rólam tartalomkezelő';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.static-page';

    protected function getPageKey(): string {
        return 'about';
    }

    protected function defineForm(): array {
        return [
            FileUpload::make('image')
                ->label('Saját kép')
                ->disk('public')
                ->directory('about')
                ->maxSize(102400)
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated'),
            TextInput::make('title')
                ->label('Rólam cím')
                ->required(),
            Textarea::make('text')
                ->label('Rólam szöveg 1')
                ->required(),
            TextInput::make('text2')
                ->label('Rólam szöveg 2')
                ->required(),
            FileUpload::make('oneletrajz')
                ->label('Önéletrajz')
                ->disk('public')
                ->directory('about')
                ->maxSize(102400)
                ->acceptedFileTypes(['application/pdf']),
        ];
    }
}
