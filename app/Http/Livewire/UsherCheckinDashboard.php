<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

class UsherCheckinDashboard extends Component
{
    public function render()
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

        return view('livewire.usher-checkin-dashboard', $data);
    }
}
