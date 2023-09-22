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

Route::get('test', [\App\Http\Controllers\TestController::class, 'test']);

Route::prefix('product')->group(function (){
    Route::get('', [\App\Http\Controllers\Site\Product\ProductController::class, 'index'])->name('site.product');
    Route::get('{slug}', [\App\Http\Controllers\Site\Product\ProductController::class, 'show'])->name('site.product.show');
});

Route::prefix('category')->group(function (){
    Route::get('{slug}', [\App\Http\Controllers\Site\CategoryProduct\CategoryProductController::class, 'index'])->name('site.category.show');
});

Route::prefix('cart')->group(function (){
    Route::get('', [\App\Http\Controllers\Site\Cart\CartController::class, 'index'])->name('site.cart');
    Route::post('ajax/add', [\App\Http\Controllers\Site\Cart\CartController::class, 'store'])->name('site.cart.ajax.add');
    Route::post('update', [\App\Http\Controllers\Site\Cart\CartController::class, 'update'])->name('site.cart.update');
    Route::get('checkout', [\App\Http\Controllers\Site\Cart\CheckoutController::class, 'index'])->name('site.cart.checkout');
});

Route::prefix('order')->group(function (){
    Route::get('', [\App\Http\Controllers\Site\Order\OrderController::class, 'show'])->name('site.order');
    Route::post('store', [\App\Http\Controllers\Site\Order\OrderController::class, 'store'])->name('site.order.store');
});

// Изображения
Route::prefix('storage')->group(function (){
    Route::get('images/{dir}/{method}/{size}/{file}', [\App\Http\Controllers\Site\Image\ThumbnailController::class, 'store'])
        ->where('method', 'resize|crop|fit')
        ->where('size', '\d+x\d+')
        ->where('file', '.+\.(png|jpg|jpeg|gif|bmp)$')
        ->name('storage.thumbnail');
});

// Сохранение сообщений со страницы контактов
Route::post('feedback/store', [\App\Http\Controllers\Site\FeedbackController::class, 'store'])->name('site.feedback.store');


Route::prefix('contacts')->group(function () {
    Route::get('', [\App\Http\Controllers\Site\Contact\ContactController::class, 'show'])->name('site.contact');
});

Route::middleware(['auth'])->prefix('cabinet')->group(function () {
    Route::get('', [\App\Http\Controllers\Site\Cabinet\CabinetController::class, 'show'])->name('site.cabinet.show');
});


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

    Route::prefix('permission')->group(
        base_path('routes/admin/permission.php'),
    );

    Route::prefix('role')->group(
        base_path('routes/admin/role.php'),
    );

    Route::prefix('user-and-role')->group(
        base_path('routes/admin/user_and_role.php'),
    );
});
// ============================= END ADMIN =========================================================================

// Sitemaps
Route::prefix('sitemap')->group(function (){
    // Главная
    Route::get('', [\App\Http\Controllers\Admin\Sitemap\SitemapController::class, 'index'])->name('sitemap.index');
    Route::get('products', [\App\Http\Controllers\Admin\Sitemap\SitemapController::class, 'products'])->name('sitemap.products');
});

// default
Route::prefix('{alias}')->group(function () {
    Route::get('', [\App\Http\Controllers\Site\Page\PageController::class, 'show'])->name('site.page');
});
