<?php

namespace App\Filament\Resources\AttendanceResource;

use Filament\Tables\Columns\TextColumn;

final class AttendanceTable
{
    public static function columns()
    {
        return [
            TextColumn::make('serial_number'),
            TextColumn::make('invitation.name')
                      ->label('Guest Name'),
            TextColumn::make('invitation.guest_code')
                      ->label('Guest Code'),
            TextColumn::make('invitation.seating.name')
                      ->label('Seating'),
            TextColumn::make('invitation.guests')
                      ->label('Guest(s)'),
            TextColumn::make('attendance.invitation.name')
                      ->label('Checked-in By'),
        ];
    }
}
