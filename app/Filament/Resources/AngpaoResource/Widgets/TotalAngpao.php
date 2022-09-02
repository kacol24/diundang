<?php

namespace App\Filament\Resources\AngpaoResource\Widgets;

use App\Models\Invitation;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalAngpao extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        $invitations = Invitation::get();
        $grooms = $invitations->where('group.is_bride', false);
        $brides = $invitations->where('group.is_bride', true);

        $groomsAngpao = $grooms->sum('angpao');
        $bridesAngpao = $brides->sum('angpao');
        $totalAngpao = $invitations->sum('angpao');

        return [
            Card::make("Total Groom's", 'Rp'.number_format($groomsAngpao, 0, ',', '.')),
            Card::make("Total Bride's", 'Rp'.number_format($bridesAngpao, 0, ',', '.')),
            Card::make('Total', 'Rp'.number_format($totalAngpao, 0, ',', '.')),
        ];
    }
}
