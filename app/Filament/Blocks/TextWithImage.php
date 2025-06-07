<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Sevendays\FilamentPageBuilder\Blocks\BlockEditorBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\RichEditor;

class TextWithImage extends BlockEditorBlock {

    public function form(): array
    {
        return [
            Group::make([
                RichEditor::make('content')
                    ->label('Szöveges tartalom')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('text-blocks')
                    ->columnSpanFull(),
            ]),
            Group::make([
                ToggleButtons::make('image_alignment')
                    ->grouped()
                    ->label('Kép elhelyezkedése')
                    ->options([
                        'left' => 'Bal oldal',
                        'right' => 'Jobb oldal',
                    ])
                    ->icons([
                        'left' => 'heroicon-o-bars-3-bottom-left',
                        'right' => 'heroicon-o-bars-3-bottom-right',
                    ])->default('left'),
                TextInput::make('alt')
                    ->label('Alternatív szöveg')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Kép')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('caption')
                    ->label('Kép alatti szöveg')
                    ->columnSpanFull(),
            ])

        ];
    }

    public function renderDisplay(array $state): string|View
    {
        return view('filament.blocks.text-with-image', $state);
    }
}
