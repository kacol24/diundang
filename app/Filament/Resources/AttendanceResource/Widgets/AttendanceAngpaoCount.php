<?php

namespace App\Filament\Resources\AttendanceResource\Widgets;

use App\Models\Attendance;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class AttendanceAngpaoCount extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        $attendanceGroup = Attendance::get()->groupBy('sequence_group');
        $widgets = [];

        foreach ($attendanceGroup as $sequenceGroup => $attendances) {
            $widgets[] = Card::make('Usher', $sequenceGroup)
                             ->description('Checked-in: '.$attendances->count().' | Angpao count: '.$attendances->sum('gift_count'));
        }

        return $widgets;
    }
}
