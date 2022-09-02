<?php

namespace App\Filament\Resources\AngpaoResource\Pages;

use App\Filament\Resources\AngpaoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAngpaos extends ManageRecords
{
    protected static string $resource = AngpaoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
