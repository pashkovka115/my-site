<?php

namespace App\Servises;

use App\Models\Currency;

class CurrencyConversion
{
    public static function convert($sum)
    {
        $originCurrency = Currency::where('base', true)->first();
        if ($originCurrency){
            $targetCurrencyCode = session('currency', $originCurrency->code);
            $targetCurrency = Currency::where('code', $targetCurrencyCode)->first();

            return $sum * $originCurrency->rate / $targetCurrency->rate;
        }
        return false;
    }
}
