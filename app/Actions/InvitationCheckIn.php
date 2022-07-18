<?php

namespace App\Actions;

use App\Data\CheckInData;
use App\Models\Attendance;
use App\Models\Invitation;

class InvitationCheckIn
{
    public function checkIn(Invitation $invitation, CheckInData $checkInData)
    {
        $sequenceGroup = $checkInData->sequenceGroup;
        $attendanceId = $checkInData->attendanceId;

        if ($invitation->attendance()->exists()) {
            return $invitation->attendance->where('invitation_id', $invitation->id)
                                          ->where('sequence_group', $sequenceGroup)
                                          ->orderBy('sequence', 'desc')
                                          ->first();
        }

        $lastSequence = Attendance::query()
                                  ->when($sequenceGroup, function ($query) use ($sequenceGroup) {
                                      return $query->where('sequence_group', $sequenceGroup);
                                  })
                                  ->latest('sequence')
                                  ->first();

        $nextSequence = 1;
        if ($lastSequence) {
            $nextSequence = $lastSequence->sequence + 1;
        }

        $attendance = Attendance::create([
            'invitation_id'  => $invitation->id,
            'sequence_group' => $sequenceGroup,
            'sequence'       => $nextSequence,
            'has_gift'       => $checkInData->hasGift,
        ]);

        if ($attendanceId) {
            $attendance->update([
                'attendance_id' => $attendanceId,
            ]);
        }

        return $attendance;
    }
}
