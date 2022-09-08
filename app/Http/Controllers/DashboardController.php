<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $attendances = Attendance::latest()->get();
        $bySequenceGroup = $attendances->groupBy('sequence_group');
        [$brides, $grooms] = $attendances->partition(function ($attendance) {
            return optional($attendance->invitation->group)->is_bride;
        });

        $data = [
            'attendances'     => $attendances,
            'bySequenceGroup' => $bySequenceGroup,
            'brides'          => $brides,
            'grooms'          => $grooms,
        ];

        return view('dashboard', $data);
    }
}
