<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvitationResource\Pages;
use App\Filament\Resources\InvitationResource\RelationManagers;
use App\Models\Invitation;
use App\Models\Seating;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class InvitationResource extends Resource
{
    protected static ?string $navigationGroup = 'Invitations';

    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema())
            ->columns([
                'sm' => 3,
                'lg' => null,
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

    public static function getFormSchema()
    {
        return [
            Group::make()
                 ->schema([
                     Section::make('Guest Detail')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                                          ->required(),
                                Forms\Components\TextInput::make('phone')
                                                          ->unique(ignorable: fn(?Model $record): ?Model => $record)
                                                          ->type('tel')
                                                          ->prefix('+62'),
                                Forms\Components\Select::make('group_id')
                                                       ->label('Group')
                                                       ->options(\App\Models\Group::all()->pluck('name', 'id'))
                                                       ->searchable(),
                            ]),
                     Section::make('Invitation Detail')
                            ->schema([
                                Forms\Components\TextInput::make('guest_code')
                                                          ->unique(ignorable: fn(?Model $record): ?Model => $record),
                                Forms\Components\Select::make('seating_id')
                                                       ->label('Table')
                                                       ->options(Seating::all()->pluck('name', 'id'))
                                                       ->searchable(),
                                Forms\Components\TextInput::make('guests')
                                                          ->required()
                                                          ->type('number')
                                                          ->suffix('person(s)')
                                                          ->default(1)
                                                          ->minValue(1),
                            ]),
                 ])->columnSpan([
                    'sm' => 2,
                ]),
            Group::make()
                 ->schema([
                     Section::make('RSVP Detail')
                            ->schema([
                                Forms\Components\Toggle::make('is_attending'),
                                Forms\Components\DateTimePicker::make('rsvp_at')
                                                               ->label('RSVP At'),
                            ]),
                 ])
                 ->columnSpan(1),
        ];
    }
}
