<?php

namespace App\GraphQL\Mutations;

use App\Actions\InvitationCheckIn;
use App\Data\CheckInData;
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
        $hasGift = (bool) optional($args)['has_gift'];
        $notes = optional($args)['notes'];

        $guestCode = $args['guest_code'];

        $invitation = Invitation::where('guest_code', $guestCode)->first();

        return [
            'attendance'  => (new InvitationCheckIn)->checkIn(
                $invitation,
                CheckInData::fromArray([
                    'sequence_group' => $sequenceGroup,
                    'attendance_id'  => $attendanceId,
                    'has_gift'       => $hasGift,
                    'notes'          => $notes,
                ])
            ),
            'invitations' => Invitation::ordered()->get(),
        ];
    }
}
