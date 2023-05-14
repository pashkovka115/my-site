<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'index'])->name('admin.product');
Route::get('create', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'create'])->name('admin.product.create');
Route::post('store', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'store'])->name('admin.product.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'edit'])->name('admin.product.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'update'])->name('admin.product.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Product\ProductAdminController::class, 'destroy'])->name('admin.product.destroy');

Route::post('product-columns-update', [\App\Http\Controllers\Admin\Product\ProductColumnAdminController::class, 'update'])->name('admin.product.columns.update');

Route::post('add-additional-field', [\App\Http\Controllers\Admin\Product\ProductAdditionalFieldsController::class, 'store'])->name('admin.product.additional_fields.store');


Route::prefix('tab')->group(function (){
    Route::post('store', [\App\Http\Controllers\Admin\Product\ProductTabAdminController::class, 'store'])->name('admin.product.tab.store');
    Route::post('update', [\App\Http\Controllers\Admin\Product\ProductTabAdminController::class, 'update'])->name('admin.product.tab.update');
});
