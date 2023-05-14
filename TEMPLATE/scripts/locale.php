<?php

//web.php
Route::get('locale/{locale}', 'Site\HomeController@changeLocale')->name('locale');

Route::group(['middleware' => 'locale'], function () {
    Route::get('/', function () {
        return redirect(app()->getLocale(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)));
    });
});

Route::group(['namespace' => 'Site', 'middleware' => 'locale', 'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],], function () {
    // Base websites Urls
    Route::get('/', 'HomeController@index')->name('home');
});


//SetLocale.php - middleware
public
function handle(Request $request, Closure $next)
{
    App::setLocale(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    return $next($request);
}

//Роуты в home.blade.php
//href="{{ route('bonus', [app()->getLocale()])}}
