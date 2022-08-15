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
        $hasGift = optional($args)['has_gift'];

        $guestCode = $args['guest_code'];

        $invitation = Invitation::where('guest_code', $guestCode)->first();

        (new InvitationCheckIn)
            ->checkIn(
                $invitation,
                CheckInData::fromArray([
                    'sequence_group' => $sequenceGroup,
                    'attendance_id' => $attendanceId,
                    'has_gift' => $hasGift,
                ])
            );

        return $invitation;
    }
}
