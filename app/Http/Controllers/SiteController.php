<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Servises\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class SiteController extends Controller
{
    public function __construct(Request $request)
    {
        if (!$request->hasCookie(Site::cartId())){
            setcookie(Site::cartId(), uniqid(session()->getId()));
        }
    }

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
