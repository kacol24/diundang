<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Import extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-upload';

    protected static string $view = 'filament.pages.import';

    protected static ?string $navigationGroup = 'Settings';
}
