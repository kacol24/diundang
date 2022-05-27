<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvitationResource\Pages;
use App\Filament\Resources\InvitationResource\RelationManagers;
use App\Models\Invitation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class InvitationResource extends Resource
{
    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('guest_code')
                                          ->required(),
                Forms\Components\TextInput::make('name')
                                          ->required(),
                Forms\Components\TextInput::make('phone')
                                          ->required()
                                          ->type('tel')
                                          ->prefix('+62'),
                Forms\Components\TextInput::make('guests')
                                          ->required()
                                          ->type('number')
                                          ->minValue(1),
                Forms\Components\BelongsToSelect::make('seating_id')
                                                ->relationship('seating', 'name')
                                                ->searchable()
                                                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guest_code'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone')
                                         ->prefix('+62'),
                Tables\Columns\TextColumn::make('guests'),
                Tables\Columns\TextColumn::make('seating.name'),
            ])
            ->filters([
                //
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
            'index'  => Pages\ListInvitations::route('/'),
            'create' => Pages\CreateInvitation::route('/create'),
            'edit'   => Pages\EditInvitation::route('/{record}/edit'),
        ];
    }
}
