<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Actions\InvitationCheckIn;
use App\Data\CheckInData;
use App\Filament\Resources\AttendanceResource;
use App\Models\Invitation;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Filters\Layout;

class ManageAttendances extends ManageRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                                ->using(function ($data) {
                                    $invitation = Invitation::find($data['invitation_id']);

                                    return (new InvitationCheckIn)
                                        ->checkIn($invitation, CheckInData::fromFilament($data));
                                }),
        ];
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AttendanceResource\Widgets\AttendanceAngpaoCount::class,
        ];
    }
}
