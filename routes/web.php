<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\UserMenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserCartController;

Route::get('/', function () {return view('User.Home.index');});

Route::get('/menu', function () {return view('User.menu.index');});

Route::get('/about', function () {return view('User.About.index');});

Route::get('/contact', function () {return view('User.Contact.index');});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// User menu controller
Route::get('/menu', [UserMenuController::class, 'index'])->name('User.menu.index');

// Home controller
Route::get('/', [HomeController::class, 'index'])->name('User.Home.index');

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

// Menu Routes
Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.Menu.index')->middleware('admin.auth');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.Menu.create')->middleware('admin.auth');
Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.Menu.store')->middleware('admin.auth');
Route::get('/admin/menus/{id}/edit', [MenuController::class, 'edit'])->name('admin.Menu.edit')->middleware('admin.auth');
Route::put('/admin/menus/{id}', [MenuController::class, 'update'])->name('admin.Menu.update')->middleware('admin.auth');
Route::delete('/admin/menus/{id}', [MenuController::class, 'destroy'])->name('admin.Menu.destroy')->middleware('admin.auth');

// POS Routes
Route::get('/admin/pos', [POSController::class, 'index'])->name('admin.POS.index')->middleware('admin.auth');

// Order Routes
Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.Order.index')->middleware('admin.auth');

// USER CART ROUTES
Route::get('/cart', [UserCartController::class, 'index'])->name('user.cart');
Route::post('/cart/add', [UserCartController::class, 'add'])->name('user.cart.add');
Route::get('/cart/remove/{id}', [UserCartController::class, 'remove'])->name('user.cart.remove');
Route::get('/cart/clear', [UserCartController::class, 'clear'])->name('user.cart.clear');
Route::post('/place-order', [UserCartController::class, 'placeOrder'])->name('user.place.order');
Route::get('/order-success', [UserCartController::class, 'success'])->name('User.order-success.index');
Route::get('/cart' , [UserCartController::class, 'index'])->name('User.cart.index');