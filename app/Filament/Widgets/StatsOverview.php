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
        $invitations = Invitation::get();
        $seatings = Seating::get();

        return [
            Card::make(
                'RSVP  ('.$invitations->whereNotNull('is_attending')->count().' of '.$invitations->count().')',
                $invitations->where('is_attending', true)->count().' are attending'
            )->description(
                $invitations->where('is_attending', false)
                            ->count().' cannot make it | '.$invitations->whereNull('is_attending')
                                                                       ->count().' have not respond'
            ),
            Card::make('Confirmed Guests', $invitations->where('is_attending', true)->sum('pax'))
                ->description('Total invited guests: '.$invitations->sum('guests')),

            Card::make('Confirmed Table', $seatings->sum('confirmed_table_count'))
                ->description('Estimated: '.$seatings->sum('table_count')),
        ];
    }
}
