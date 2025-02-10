<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DateInput;
use Filament\Forms\Components\DatePicker;
use App\Models\Tag;
use Filament\Tables\Columns\FileUploadColumn;
use Filament\Tables\Columns\ImageColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = 'Dinamikus tartalom';

    protected static ?string $navigationLabel = 'Projektek';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(12)
            ->schema([
                Section::make('Projekt leírás')->columnSpan(6)->schema([
                    TextInput::make('title')->minLength(3)->required(),
                    Textarea::make('description')->rows(3)->minLength(3)->required(),
                    Textarea::make('body')->rows(6)->required(),
                    FileUpload::make('cover')->label('Bórítókép')
                    ->disk('public')
                    ->directory('projects')
                    ->image()
                    ->required()
                    ->maxSize(102400),
                    FileUpload::make('images')
                    ->label('Képek feltöltése')
                    ->disk('public')
                    ->directory('projects')
                    ->multiple()
                    ->preserveFilenames()
                    ->image()
                    ->maxSize(102400)
                ]),
                Section::make('Projekt részletek')->columnSpan(6)->schema([
                    TextInput::make('slug')->label('Útvonal')->minLength(3)->required(),
                    Select::make('status')->label('Státusz')->options([
                        'finished' => 'Befejezett',
                        'active' => 'Folyamatban',
                        'inactive' => 'Inaktív',
                    ])->required(),
                    Select::make('tags')
                        ->relationship('tags', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->label('Címkék')
                        ->required(),
                    TextInput::make('github')
                        ->url()
                        ->required(),
                    TextInput::make('demo')
                        ->url()
                        ->nullable(),
                    DatePicker::make('start_date')
                        ->label('Kezdési időpont'),
                    DatePicker::make('end_date')
                        ->label('Befejezési időpont'),
                    Toggle::make('visible')
                        ->default(true),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')->label('Borítókép'),
                TextColumn::make('title')->label('Cím')->sortable()->searchable(),
                TextColumn::make('description')->label('Leírás')->sortable()->searchable(),
                ToggleColumn::make('visible')->label('Láthatóság')->sortable(),
                TextColumn::make('created_at')->label('Létrehozás dátuma')->dateTime()->sortable(),
                TextColumn::make('updated_at')->label('Módosítás dátuma')->dateTime()->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
