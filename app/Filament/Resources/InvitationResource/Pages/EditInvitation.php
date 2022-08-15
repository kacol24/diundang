<?php

namespace App\Filament\Resources\InvitationResource\Pages;

use App\Events\InvitationUpdated;
use App\Filament\Resources\InvitationResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditInvitation extends EditRecord
{
    protected static string $resource = InvitationResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        event(new InvitationUpdated($record));

        return $record;
    }
}
