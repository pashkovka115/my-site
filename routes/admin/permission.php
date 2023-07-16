<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'index'])->name('admin.permission');
Route::get('sync', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'sync'])->name('admin.permission.sync');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'edit'])->name('admin.permission.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'update'])->name('admin.permission.update');

Route::get('create', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'create'])->name('admin.permission.create');
Route::post('store', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'store'])->name('admin.permission.store');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'destroy'])->name('admin.permission.destroy');

