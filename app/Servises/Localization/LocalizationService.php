<?php

namespace App\Servises\Localization;

use Illuminate\Support\Facades\Facade;

class LocalizationService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Localization';
    }
}
