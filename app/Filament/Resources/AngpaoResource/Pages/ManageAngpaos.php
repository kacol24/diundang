<?php

namespace App\Filament\Resources\AngpaoResource\Pages;

use App\Filament\Resources\AngpaoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ManageAngpaos extends ManageRecords
{
    protected static string $resource = AngpaoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AngpaoResource\Widgets\TotalAngpao::class,
        ];
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->fastPaginate($this->getTableRecordsPerPage());
    }
}
