<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\InvitationResource;
use App\Models\Invitation;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestRsvp extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getTableQuery(): Builder
    {
        return Invitation::latest('rsvp_at')->limit(5);
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('guest_code'),
            TextColumn::make('full_name'),
            TextColumn::make('group.group_name'),
            TextColumn::make('seating.name')
                      ->label('Table'),
            TextColumn::make('guests')
                      ->label('Max. Guests'),
            BooleanColumn::make('is_attending'),
            TextColumn::make('rsvp_at')
                      ->dateTime(),
            TextColumn::make('pax'),
        ];
    }
}
