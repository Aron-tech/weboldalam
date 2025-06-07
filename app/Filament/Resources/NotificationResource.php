<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Név'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label('Név'),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label('E-mail'),
                TextColumn::make('subject')
                    ->sortable()
                    ->searchable()
                    ->label('Tárgy'),
                TextColumn::make('phone')
                    ->sortable()
                    ->label('Telefonszám'),
                ToggleColumn::make('read')
                    ->label('Elolvasva')
                    ->sortable()
                    ->onColor('success')
                    ->offColor('danger'),
                TextColumn::make('read')
                    ->label('...')
                    ->colors([
                        'success' => true, // zöld
                        'danger' => false, // piros
                    ]),
                TextColumn::make('read')
                    ->label('')
                    ->formatStateUsing(fn (bool $state) => 'Elolvasva')
                    ->colors([
                        'success' => fn ($state) => $state,
                        'danger' => fn ($state) => !$state,
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
               //
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
            'index' => Pages\ListNotifications::route('/'),
        ];
    }
}
