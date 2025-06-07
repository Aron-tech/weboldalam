<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Sevendays\FilamentPageBuilder\Blocks\BlockEditorBlock;
use Filament\Forms\Components\FileUpload;

class ImageBlock extends BlockEditorBlock {
    public function form(): array
    {
        return [
            TextInput::make('title')
                ->label('Cím')
                ->columnSpanFull(),
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
                ->label('Szöveg')
                ->columnSpanFull(),
        ];
    }

    public function renderDisplay(array $state): string|View
    {
        return view('filament.blocks.image-block', $state);
    }
}
