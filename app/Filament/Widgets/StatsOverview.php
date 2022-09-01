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

        $invitationsHasAttending = $invitations->whereNotNull('is_attending');
        $invitationsNullAttending = $invitations->whereNull('rsvp_at');
        $invitationsAttending = $invitations->where('is_attending', true);

        $templateRsvpWidgetTitle = 'RSVP ({already_rsvp} of {total_invitations})';
        $rsvpWidgetTitle = str_replace(
            [
                '{already_rsvp}',
                '{total_invitations}',
            ],
            [
                $invitations->whereNotNull('rsvp_at')->count(),
                $invitations->count(),
            ],
            $templateRsvpWidgetTitle);

        $templateRsvpWidgetDescription = '{not_attending_count} cannot make it | {no_response_count} have not respond';
        $rsvpWidgetDescription = str_replace(
            [
                '{not_attending_count}',
                '{no_response_count}',
            ],
            [
                $invitationsHasAttending->where('is_attending', 0)->count(),
                $invitationsNullAttending->count(),
            ],
            $templateRsvpWidgetDescription
        );

        return [
            Card::make($rsvpWidgetTitle, $invitationsAttending->count().' are attending')
                ->description($rsvpWidgetDescription),
            Card::make('Confirmed Guests', $invitationsAttending->sum('pax'))
                ->description('Total invited guests: '.$invitations->sum('guests')),

            Card::make('Confirmed Table', $seatings->sum('confirmed_table_count'))
                ->description('Estimated: '.$seatings->sum('table_count')),


        ];
    }
}
