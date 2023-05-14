<?php

namespace App\Servises\Localization;

use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Localization', Localization::class);
    }
}
