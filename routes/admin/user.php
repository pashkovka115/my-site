<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'index'])->name('admin.user');
Route::get('create', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'create'])->name('admin.user.create');
Route::post('store', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'store'])->name('admin.user.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'edit'])->name('admin.user.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'update'])->name('admin.user.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Users\UserAdminController::class, 'destroy'])->name('admin.user.destroy');
