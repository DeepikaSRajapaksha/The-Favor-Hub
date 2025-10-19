<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\Admin\AdminUserController;

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

// User Routes
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index')->middleware('admin.auth');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create')->middleware('admin.auth');
Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store')->middleware('admin.auth');
Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit')->middleware('admin.auth');
Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update')->middleware('admin.auth');
Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy')->middleware('admin.auth');