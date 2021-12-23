<?php

namespace App\GraphQL\Mutations;

use App\Models\Attendance;
use App\Models\Invitation;

class CheckIn
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $sequenceGroup = optional($args)['sequence_group'];
        $guestCode = $args['guest_code'];

        $invitation = Invitation::where('guest_code', $guestCode)->first();

        if ($invitation->attendance()->exists()) {
            return $invitation->attendance->where('sequence_group', $sequenceGroup)
                                          ->orderBy('sequence', 'desc')
                                          ->first();
        }

        $lastSequence = Attendance::when($sequenceGroup, function ($query) use ($sequenceGroup) {
            return $query->where('sequence_group', $sequenceGroup);
        })
                                  ->latest('sequence')
                                  ->first();

        $nextSequence = 1;
        if ($lastSequence) {
            $nextSequence = $lastSequence->sequence + 1;
        }

        $attendance = $invitation->attendance()->create([
            'sequence_group' => $sequenceGroup,
            'sequence'       => $nextSequence,
        ]);

        return $attendance;
    }
}
