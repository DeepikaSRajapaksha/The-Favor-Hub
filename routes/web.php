<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MenuCategoryController;

Route::get('/', function () {return view('User.Home.index');});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Dashboard (protected)
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('admin.auth');

// Menu Categories
Route::get('/categories', [MenuCategoryController::class, 'index'])->name('admin.menuCategory.index')->middleware('admin.auth');
Route::get('/categories/create', [MenuCategoryController::class, 'create'])->name('admin.menuCategory.create')->middleware('admin.auth');
Route::post('/categories', [MenuCategoryController::class, 'store'])->name('admin.menuCategory.store')->middleware('admin.auth');
Route::get('/categories/{id}/edit', [MenuCategoryController::class, 'edit'])->name('admin.menuCategory.edit')->middleware('admin.auth');
Route::put('/categories/{id}', [MenuCategoryController::class, 'update'])->name('admin.menuCategory.update')->middleware('admin.auth');
Route::delete('/categories/{id}', [MenuCategoryController::class, 'destroy'])->name('admin.menuCategory.destroy')->middleware('admin.auth');
