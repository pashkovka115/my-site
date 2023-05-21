<?php

namespace App\Servises;

use App\Models\Currency;

class CurrencyConversion
{
    public static function convert($sum)
    {
        if (session('baseCurrency') == null){
            $baseCurrency = Currency::where('base', true)->first();
            session()->put('baseCurrency', $baseCurrency);
        }else{
            $baseCurrency = session('baseCurrency');
        }

        if ($baseCurrency){
            if (session('targetCurrency') == null){
                // currency - ключ в котором хранится код текущей валюты
                $targetCurrencyCode = session('currency', $baseCurrency->code);
                $targetCurrency = Currency::where('code', $targetCurrencyCode)->first();
                session()->put('targetCurrency', $targetCurrency);
            }else{
                $targetCurrency = session('targetCurrency');
            }

            return $targetCurrency->symbol_left
                . (number_format($sum * $baseCurrency->rate / $targetCurrency->rate, 0, ',', ' '))
                . $targetCurrency->symbol_right;
        }
        return false;
    }
}
