<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

class UsherCheckinDashboard extends Component
{
    public $usherMap = [
        'P' => 'Peter',
        'S' => 'Sutrisno',
        'V' => 'Verly',
        'Z' => 'Zella',
    ];

    public function render()
    {
        $attendances = Attendance::latest()->get();
        $bySequenceGroup = $attendances->groupBy('sequence_group');

        $data = [
            'attendances'     => $attendances,
            'bySequenceGroup' => $bySequenceGroup,
        ];

        return view('livewire.usher-checkin-dashboard', $data);
    }
}
