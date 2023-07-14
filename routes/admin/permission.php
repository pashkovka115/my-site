<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'index'])->name('admin.permission');
Route::get('sync', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'sync'])->name('admin.permission.sync');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'edit'])->name('admin.permission.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'update'])->name('admin.permission.update');

//Route::post('store', [\App\Http\Controllers\Admin\Ajax\AjaxController::class, 'saveOrderBlocks'])->name('admin.ajax.save_order_blocks.store');

