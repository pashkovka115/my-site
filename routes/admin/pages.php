<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'index'])->name('admin.page');
Route::get('create', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'create'])->name('admin.page.create');
Route::post('store', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'store'])->name('admin.page.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'edit'])->name('admin.page.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'update'])->name('admin.page.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Page\PageAdminController::class, 'destroy'])->name('admin.page.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Page\PageColumnAdminController::class, 'update'])->name('admin.page.columns.update');

Route::post('add-additional-field', [\App\Http\Controllers\Admin\Page\PageAdditionalFieldsController::class, 'store'])->name('admin.page.additional_fields.store');

Route::prefix('tab')->group(function (){
    Route::post('store', [\App\Http\Controllers\Admin\Page\PageTabAdminController::class, 'store'])->name('admin.page.tab.store');
    Route::post('update', [\App\Http\Controllers\Admin\Page\PageTabAdminController::class, 'update'])->name('admin.page.tab.update');
});
