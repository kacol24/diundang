<?php

namespace App\Filament\Resources\AttendanceResource;

use App\Models\Attendance;
use App\Models\Invitation;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

final class AttendanceForm
{
    public static function schema()
    {
        return [
            Grid::make()
                ->schema([
                    Select::make('invitation_id')
                          ->options(
                              Invitation::doesntHave('attendance')
                                        ->get()
                                        ->pluck('dropdown_name', 'id')
                          )
                          ->reactive()
                          ->searchable(),
                    TextInput::make('sequence_group'),
                ]),
            Grid::make()
                ->schema([
                    Select::make('attendance_id')
                          ->label('Checked-in By')
                          ->options(function (callable $get) {
                              $invitationId = $get('invitation_id');

                              return Attendance::whereNull('attendance_id')
                                               ->where('id', '!=', $invitationId)
                                               ->get()
                                               ->pluck('invitation.name', 'id');
                          })
                          ->searchable(),
                    Toggle::make('has_gift')
                          ->inline(false)
                          ->default(true),
                ]),
        ];
    }
}
