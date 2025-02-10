<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationGroup = 'Dinamikus tartalom';

    protected static ?string $navigationLabel = 'Szolgáltatások';

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Szolgáltatás leírás és tartalom')
                    ->schema([
                        TextInput::make('name')->label('Név')->unique()->minLength(3)->required(),
                        TextInput::make('icon')->label('Ikon ()')->unique()->minLength(3)->required(),

                        Textarea::make('body')->label('Tartalom')->rows(5)->required(),
                        FileUpload::make('images')
                            ->label('Képek feltöltése')
                            ->disk('public')
                            ->directory('services')
                            ->multiple()
                            ->preserveFilenames()
                            ->image()
                            ->maxSize(102400),
                        FileUpload::make('videos')
                            ->label('Videók feltöltése')
                            ->disk('public')
                            ->directory('services')
                            ->multiple()
                            ->preserveFilenames(),
                    ]),
                    Section::make('Szolgáltatás adaotk')
                        ->schema([
                            TextInput::make('slug')
                                ->minLength(3)
                                ->unique()
                                ->required(),
                            Toggle::make('visible')
                                ->label('Láthatóság')
                                ->default(true),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
