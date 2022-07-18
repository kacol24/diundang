<?php

namespace App\GraphQL\Mutations;

use App\Actions\InvitationCheckIn;
use App\Models\Attendance;
use App\Models\Invitation;

final class CheckIn
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $sequenceGroup = optional($args)['sequence_group'];
        $attendanceId = optional($args)['attendance_id'];
        $guestCode = $args['guest_code'];

        $invitation = Invitation::where('guest_code', $guestCode)->first();

        (new InvitationCheckIn)->checkIn($invitation, $sequenceGroup, $attendanceId);

        return $invitation;
    }
}
