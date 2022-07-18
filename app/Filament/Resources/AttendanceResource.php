<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('invitation_id')
                                       ->relationship('invitation', 'name')
                                       ->getOptionLabelFromRecordUsing(fn(Model $record
                                       ) => "{$record->name} {$record->phone}")
                                       ->searchable(),
                Forms\Components\Grid::make()
                                     ->schema([
                                         Forms\Components\TextInput::make('sequence_group'),
                                         Forms\Components\TextInput::make('sequence')
                                                                   ->type('number')
                                                                   ->disabled()
                                                                   ->hint('Auto-generated'),
                                     ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial_number'),
                Tables\Columns\TextColumn::make('invitation.name')
                                         ->label('Guest Name'),
                Tables\Columns\TextColumn::make('invitation.guest_code')
                                         ->label('Guest Code'),
                Tables\Columns\TextColumn::make('invitation.seating.name')
                                         ->label('Seating'),
                Tables\Columns\TextColumn::make('invitation.guests')
                                         ->label('Guest(s)'),
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
            //'index'  => Pages\ListAttendances::route('/'),
            //'create' => Pages\CreateAttendance::route('/create'),
            //'edit'   => Pages\EditAttendance::route('/{record}/edit'),
            'index' => Pages\ManageAttendances::route('/'),
        ];
    }
}
