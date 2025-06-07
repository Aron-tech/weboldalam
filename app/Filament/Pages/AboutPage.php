<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;

class AboutPage extends BaseStaticPage {
    protected static ?string $navigationLabel = 'Rólam';
    protected static ?string $title = 'Rólam tartalomkezelő';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = 2;
    protected function getPageKey(): string {
        return 'about';
    }

    protected function defineForm(): array {
        return [
            Section::make('Rólam oldal')
                ->schema([
                    FileUpload::make('image')
                        ->label('Saját kép')
                        ->disk('public')
                        ->directory('about')
                        ->maxSize(102400)
                        ->panelLayout('integrated')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ]),
                    TextInput::make('title')
                        ->label('Rólam cím')
                        ->required(),
                    Repeater::make('p')
                        ->schema([
                            Textarea::make('text')
                                ->label('Tartalom')
                                ->rows(3)
                                ->required(),
                        ])
                        ->grid(2)
                        ->label('Szöveges tartalomak'),
                    FileUpload::make('oneletrajz')
                        ->label('Önéletrajz')
                        ->disk('public')
                        ->directory('about')
                        ->maxSize(102400)
                        ->acceptedFileTypes(['application/pdf']),
                    TextArea::make('last_body')
                        ->label('Utolsó szöveges tartalom')
                        ->rows(4)
                        ->required(),
                ]),
            Section::make('Tanulmányok')
                ->schema([
                    Repeater::make('education')
                        ->label('Tanulmányok')
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Intézmény logója')
                                ->disk('public')
                                ->directory('about')
                                ->maxSize(102400)
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                            Group::make(
                                [
                                    TextInput::make('name')
                                        ->label('Intézmény neve')
                                        ->required(),
                                    TextInput::make('title')
                                        ->label('Képzés neve')
                                        ->required(),
                                    TextInput::make('year')
                                        ->label('Évszám')
                                        ->required(),
                                    TextInput::make('link')
                                        ->label('Weboldal')
                                        ->required(),
                                ]
                            )
                    ])
                    ->columns(2)
                    ->addActionLabel('Új tanulmány hozzáadása'),
                ]),
            Section::make('Tapasztalataim')
                ->schema([
                    Repeater::make('companies')
                        ->label('Cégek')
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Cég logója')
                                ->disk('public')
                                ->directory('about')
                                ->maxSize(102400)
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                            Group::make(
                                [
                                    TextInput::make('name')
                                        ->label('Cég neve')
                                        ->required(),
                                    TextInput::make('title')
                                        ->label('Cég pozíció')
                                        ->required(),
                                    TextInput::make('period')
                                        ->label('Időtartam')
                                        ->required(),
                                    TextInput::make('link')
                                        ->label('Weboldal')
                                        ->required(),
                                ]
                            )
                    ])
                    ->columns(2)
                    ->addActionLabel('Új cég hozzáadása'),
                ]),
            Section::make('Programozási nyelvek')
                ->schema([
                    Repeater::make('languages')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nyelv neve')
                                ->required(),
                            TextInput::make('percent')
                                ->numeric()
                                ->label('Százalék')
                                ->required(),
                            FileUpload::make('svg')
                                ->label('Nyelv logója')
                                ->disk('public')
                                ->directory('about')
                                ->maxSize(102400)
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                        ])
                        ->label('Nyelvek')
                        ->grid(4)
                        ->addActionLabel('Új nyelv hozzáadása'),
                ]),
                Section::make('Keretrendszerek')
                ->schema([
                    Repeater::make('frameworks')
                        ->schema([
                            TextInput::make('name')
                                ->label('Keretrendszer neve')
                                ->required(),
                            TextInput::make('percent')
                                ->numeric()
                                ->label('Százalék')
                                ->required(),
                            FileUpload::make('svg')
                                ->label('Keretrendszer logója')
                                ->disk('public')
                                ->directory('about')
                                ->maxSize(102400)
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                        ])
                        ->label('Keretrendszerek')
                        ->grid(4)
                        ->addActionLabel('Új keretrendszer hozzáadása'),
                ]),
        ];
    }
}
