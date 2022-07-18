<?php

namespace App\Filament\Resources\AttendanceResource;

use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

final class AttendanceTable
{
    public static function columns()
    {
        return [
            TextColumn::make('sequence_group')
                      ->label('Usher')
                      ->toggleable(isToggledHiddenByDefault: true),
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
            BooleanColumn::make('has_gift')
                         ->action(function ($record) {
                             $record->has_gift = ! $record->has_gift;
                             $record->save();
                         }),
            TextColumn::make('created_at')
                      ->dateTime(),
        ];
    }
}
