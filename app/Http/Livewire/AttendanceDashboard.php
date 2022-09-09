<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

class AttendanceDashboard extends Component
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

        return view('livewire.attendance-dashboard', compact('attendances'));
    }
}
