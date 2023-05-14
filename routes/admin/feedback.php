<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'index'])->name('admin.feedback');
Route::get('create', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'create'])->name('admin.feedback.create');
Route::post('store', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'store'])->name('admin.feedback.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'edit'])->name('admin.feedback.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'update'])->name('admin.feedback.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackAdminController::class, 'destroy'])->name('admin.feedback.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Feedback\FeedbackColumnAdminController::class, 'update'])->name('admin.feedback.columns.update');

Route::post('add-additional-field', [\App\Http\Controllers\Admin\Feedback\FeedbackAdditionalFieldsController::class, 'store'])->name('admin.feedback.additional_fields.store');

