<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Permissions\MapPermissionController::class, 'index'])->name('admin.permission');

//Route::post('store', [\App\Http\Controllers\Admin\Ajax\AjaxController::class, 'saveOrderBlocks'])->name('admin.ajax.save_order_blocks.store');

