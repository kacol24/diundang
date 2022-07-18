<?php

namespace App\Filament\Resources\AttendanceResource;

use App\Models\Attendance;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;

final class AttendanceForm
{
    public static function schema()
    {
        return [
            Grid::make()
                ->schema([
                    Select::make('invitation_id')
                          ->relationship('invitation', 'name')
                          ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->name} {$record->phone}")
                          ->searchable(),
                    Select::make('attendance_id')
                          ->label('Checked-in By')
                          ->options(
                              Attendance::whereNull('attendance_id')->get()->pluck('invitation.name', 'id')
                          )
                          ->searchable(),
                ]),
            Grid::make()
                ->schema([
                    TextInput::make('sequence_group'),
                ]),
        ];
    }
}
