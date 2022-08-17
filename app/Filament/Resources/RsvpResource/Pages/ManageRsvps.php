<?php

namespace App\Filament\Resources\RsvpResource\Pages;

use App\Filament\Resources\RsvpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Filters\Layout;

class ManageRsvps extends ManageRecords
{
    protected static string $resource = RsvpResource::class;

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

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
