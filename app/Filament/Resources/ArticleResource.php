<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Sevendays\FilamentPageBuilder\Forms\Components\BlockEditor;
use App\Filament\Blocks\TextBlock;
use App\Filament\Blocks\ImageBlock;
use App\Filament\Blocks\TextWithImage;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationGroup = 'Dinamikus tartalom';

    protected static ?string $navigationLabel = 'Hírek';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Új hír létrehozása')
                    ->schema([
                        Group::make([
                            FileUpload::make('cover')
                                ->label('Borítókép')
                                ->disk('public')
                                ->directory('projects')
                                ->maxSize(102400)
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->required(),
                            FileUpload::make('images')
                                ->label('Banner képek')
                                ->disk('public')
                                ->directory('articles')
                                ->maxSize(102400)
                                ->image()
                                ->multiple()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                            ]),
                        Group::make([
                            TextInput::make('title')
                                ->minLength(3)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->required(),
                            TextInput::make('slug')
                                ->minLength(3)
                                ->readOnly()
                                ->unique(ignoreRecord: true)
                                ->required(),
                            Textarea::make('description')
                                ->rows(3)
                                ->minLength(3)
                                ->required(),
                        ]),
                        BlockEditor::make('blocks')
                            ->blocks([
                                TextBlock::class,
                                ImageBlock::class,
                                TextWithImage::class,
                            ])
                            ->label('Tartalom')
                            ->addActionLabel('Új blokk hozzáadása')
                            ->collapsible()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->label('Borítókép'),
                TextColumn::make('title')
                    ->label('Cím')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Leírás')
                    ->searchable()
                    ->limit(30),
                ToggleColumn::make('visible')
                    ->label('Láthatóság')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
