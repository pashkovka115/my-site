<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /*public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        \App::setLocale($locale);

        return back();
    }*/


    public function changeCurrency($currencyCode)
    {
        $currency = Currency::where('code', $currencyCode)->firstOrFail();
        session(['currency' => $currency->code]);

        return back();
    }
}
