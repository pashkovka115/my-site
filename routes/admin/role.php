<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'index'])->name('admin.role');
Route::get('create', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'create'])->name('admin.role.create');
Route::post('store', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'store'])->name('admin.role.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'edit'])->name('admin.role.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'update'])->name('admin.role.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Permissions\RoleController::class, 'destroy'])->name('admin.role.destroy');
