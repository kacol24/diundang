<?php

namespace App\Filament\Pages;

use App\Settings\BadWordsSettings;
use Filament\Forms\Components\TagsInput;
use Filament\Pages\SettingsPage;

class GeneralSettings extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = BadWordsSettings::class;

    protected function getFormSchema(): array
    {
        return [
            TagsInput::make('bad_words'),
        ];
    }
}
