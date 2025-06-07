<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Group;

class GeneralSettings extends BaseStaticPage
{
    protected static ?string $navigationLabel = 'Beállítások';
    protected static ?string $title = 'Beállítások';
    protected static ?string $navigationGroup = 'Beállítások';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 4;

    protected function getPageKey(): string {
        return 'general-settings';
    }

    protected function defineForm(): array {
        return [
            Section::make('Beállítások kezelése')
                ->schema([
                    Group::make([
                        FileUpload::make('logo')
                            ->label('Weboldal logó')
                            ->disk('public')
                            ->directory('logo')
                            ->maxSize(102400)
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                        Toggle::make('widget')
                            ->label('Support widget engedélyezése')
                            ->default(false),
                    ]),
                    Group::make([
                        TextInput::make('phone')
                            ->label('Telefonszám')
                            ->required()
                            ->tel(),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->required(),
                        TextInput::make('github')
                            ->label('Github név')
                            ->required(),
                        TextInput::make('github_link')
                            ->label('Github link')
                            ->required(),
                        TextInput::make('facebook')
                            ->label('Facebook'),
                        TextInput::make('instagram')
                            ->label('Instagram'),
                        TextInput::make('discord')
                            ->label('Discord')
                    ])->columns(2)
                ])
                ->columns(2),
        ];
    }
}
