<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'index'])->name('admin.user_and_role');
//Route::get('create', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'create'])->name('admin.user_and_role.create');
//Route::post('store', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'store'])->name('admin.user_and_role.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'edit'])->name('admin.user_and_role.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'update'])->name('admin.user_and_role.update');
//Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Permissions\UserAndRoleController::class, 'destroy'])->name('admin.user_and_role.destroy');
