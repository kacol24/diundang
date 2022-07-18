<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Actions\InvitationCheckIn;
use App\Filament\Resources\AttendanceResource;
use App\Models\Invitation;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAttendances extends ManageRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                                ->using(function ($data) {
                                    $invitation = Invitation::find($data['invitation_id']);

                                    return (new InvitationCheckIn)->checkIn(
                                        $invitation,
                                        $data['sequence_group'],
                                        $data['attendance_id']
                                    );
                                }),
        ];
    }
}
