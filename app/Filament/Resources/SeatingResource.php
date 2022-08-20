<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeatingResource\Pages;
use App\Models\Seating;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SeatingResource extends Resource
{
    protected static ?string $navigationGroup = 'Master';

    protected static ?string $model = Seating::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('nickname'),
                Forms\Components\Textarea::make('notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('nickname'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\TextColumn::make('quota'),
                Tables\Columns\TextColumn::make('confirmed_quota'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSeatings::route('/'),
        ];
    }
}
