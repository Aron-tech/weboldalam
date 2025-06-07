<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\RichEditor;
use Illuminate\Contracts\View\View;
use Sevendays\FilamentPageBuilder\Blocks\BlockEditorBlock;

class TextBlock extends BlockEditorBlock {
    public function form(): array
    {
        return [
            RichEditor::make('content')
                ->label('Szöveges tartalom')
                ->required()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('text-blocks')
                ->columnSpanFull(),
        ];
    }

    public function renderDisplay(array $state): string|View
    {
        return view('filament.blocks.text-block', $state);
    }
}
