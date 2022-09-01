<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Invitation;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestComments extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    protected function getTableQuery(): Builder
    {
        return Comment::latest()->limit(5);
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\BooleanColumn::make('is_approved'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('message'),
            Tables\Columns\TextColumn::make('created_at')
                                     ->dateTime(),
        ];
    }
}
