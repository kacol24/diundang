<?php

namespace App\Filament\Widgets;

use App\Models\Invitation;
use App\Models\Seating;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Invitations', Invitation::where('is_attending', true)->count().' are attending')
                ->description(
                    Invitation::where('is_attending', false)
                              ->count().' cannot make it | '.Invitation::whereNull('is_attending')
                                                                       ->count().' have not respond'),

            Card::make('Table Count', Seating::all()->sum('table_count'))
                ->description('Total estimated guests: '.Invitation::sum('guests')),

            Card::make('RSVP', Invitation::whereNotNull('is_attending')->count().' of '.Invitation::count()),
        ];
    }
}
