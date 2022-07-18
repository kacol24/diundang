<?php

namespace App\Filament\Resources\AttendanceResource;

use App\Models\Attendance;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                    TextInput::make('sequence_group'),
                ]),
            Grid::make()
                ->schema([
                    Select::make('attendance_id')
                          ->label('Checked-in By')
                          ->options(
                              Attendance::whereNull('attendance_id')->get()->pluck('invitation.name', 'id')
                          )
                          ->searchable(),
                    Toggle::make('has_gift')
                          ->inline(false)
                          ->default(true),
                ]),
        ];
    }
}
