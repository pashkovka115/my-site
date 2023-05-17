<?php

use App\Servises\Admin;
use Illuminate\Support\Facades\Route;

Route::get('register', [\App\Http\Controllers\Auth\RegisterAdminController::class, 'register'])->middleware('guest')->name('register');
Route::post('store', [\App\Http\Controllers\Auth\RegisterAdminController::class, 'store'])->middleware('guest')->name('auth.store');

Route::get('login', [\App\Http\Controllers\Auth\LoginAdminController::class, 'login'])->middleware('guest')->name('login');
Route::post('check', [\App\Http\Controllers\Auth\LoginAdminController::class, 'check'])->middleware('guest')->name('auth.check');
Route::get('logout', [\App\Http\Controllers\Auth\LoginAdminController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordAdminController::class, 'create'])->middleware('guest')->name('forgot-password');
Route::post('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordAdminController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('reset-password', [\App\Http\Controllers\Auth\ResetPasswordAdminController::class, 'create'])->middleware('guest')->name('password.reset');

Route::get('currensy/{currencyCode}', [\App\Http\Controllers\SiteController::class, 'changeCurrency'])->name('site.currency');
Route::get('/', [\App\Http\Controllers\Site\Home\HomeController::class, 'index'])->name('site.home');


// Auth: https://www.youtube.com/watch?v=yfxwAH3MbLY&list=PL-FhWbGlJPfZoUC9ApOR3isDIG88I_lj_


// ============================= ADMIN =========================================================================
Route::middleware(['auth', 'admin'])->prefix(Admin::prefix())->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeAdminController::class, 'index'])->name('admin.home');

    Route::prefix('category')->group(
        base_path('routes/admin/category_product.php'),
    );

    Route::prefix('product')->group(
        base_path('routes/admin/product.php'),
    );

    Route::prefix('feedback')->group(
        base_path('routes/admin/feedback.php'),
    );

    Route::prefix('page')->group(
        base_path('routes/admin/pages.php'),
    );

    Route::prefix('user')->group(
        base_path('routes/admin/user.php'),
    );

    Route::prefix('menu')->group(
        base_path('routes/admin/menu.php'),
    );

    /*Route::prefix('ajax')->group(
        base_path('routes/admin/ajax.php'),
    );*/
});
// ============================= END ADMIN =========================================================================

// Сохранение сообщений со страницы контактов
Route::post('feedback/store', [\App\Http\Controllers\Site\FeedbackAdminController::class, 'store'])->name('site.feedback.store');


// default
Route::prefix('{alias}')->group(function () {
    Route::get('', [\App\Http\Controllers\Site\PageController::class, 'show'])->name('site.page');
});
