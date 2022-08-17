<?php

namespace App\Filament\Resources\InvitationResource\Pages;

use App\Filament\Resources\InvitationResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListInvitations extends ListRecords
{
    protected static string $resource = InvitationResource::class;

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }

    protected function getTableFiltersFormColumns(): int
    {
        return 6;
    }
}
