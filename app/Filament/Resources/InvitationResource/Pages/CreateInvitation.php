<?php

namespace App\Filament\Resources\InvitationResource\Pages;

use App\Filament\Resources\InvitationResource;
use App\Models\Invitation;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateInvitation extends CreateRecord
{
    protected static string $resource = InvitationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        if (! isset($data['guest_code'])) {
            $data['guest_code'] = Invitation::generateGuestCode();
        }

        return parent::handleRecordCreation($data);
    }
}
