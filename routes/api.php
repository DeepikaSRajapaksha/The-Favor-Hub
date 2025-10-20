<?php
use App\Http\Controllers\Api\MenuApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/menus', [MenuApiController::class, 'index']);
Route::get('/menus/{id}', [MenuApiController::class, 'show']);
Route::post('/menus', [MenuApiController::class, 'store']);
Route::put('/menus/{id}', [MenuApiController::class, 'update']);
Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);


use App\Http\Controllers\Api\POSApiController;

Route::prefix('pos')->group(function () {
    Route::get('/menu', [POSApiController::class, 'getMenu']);           // Get all menu items
    Route::post('/order', [POSApiController::class, 'createOrder']);     // Create new order
    Route::get('/orders', [POSApiController::class, 'getOrders']);       // Get all orders
    Route::get('/order/{id}', [POSApiController::class, 'getOrder']);    // Get single order
});
