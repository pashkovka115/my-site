<?php

namespace App\Servises\Localization;

use App\Models\Language;

class Localization
{
    public function locale()
    {
        if (!app()->runningInConsole()) {
            $locale = request()->segment(1, '');
            $languages = Language::all();
            $codes = [];
            foreach ($languages as $language) {
                $codes[] = $language->code;
            }

            if ($locale and in_array($locale, $codes)) {
                session(['locale' => $locale]);
                \App::setLocale($locale);

                return $locale;
            } else {
                session(['locale' => self::getCodeBaseLocale()]);
                \App::setLocale(self::getCodeBaseLocale());

                return '';
            }
        }
    }


    public static function getCodeBaseLocale()
    {
        $baseLocale = Language::where('base', true)->first();
        if (isset($baseLocale->code)) {
            return $baseLocale->code;
        }
        return config('app.locale');
    }


    public static function getIdBaseLocale()
    {
        $baseLocale = Language::where('base', true)->first();
        if (isset($baseLocale->id)) {
            return $baseLocale->id;
        }

        $baseLocale = Language::first();
        if (isset($baseLocale->id)){
            return $baseLocale->id;
        }

        return 1;
    }
}
