<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BadWordsSettings extends Settings
{
    public $bad_words;

    public static function group(): string
    {
        return 'general';
    }
}
