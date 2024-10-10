<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

const BY_ID = "/{id}";
const ENDPOINT_DETAIL_BY_ID = '/detail' . BY_ID;
const ENDPOINT_EDIT_BY_ID = '/update' . BY_ID;
const ENDPOINT_DO_UPDATE_BY_ID = '/update' . BY_ID;
const ENDPOINT_DELETE_BY_ID = '/delete' . BY_ID;

// Route::get('/', [HomepageController::class, 'index']);

Route::get('/admin/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/auth/login', [AuthController::class, 'doLogin'])->name('do-login');
Route::get('/admin/auth/logout', [AuthController::class, 'doLogout'])->name('do-logout');

Route::prefix('admin')->middleware("auth")->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    // PRODUCT
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/add', [ProductController::class, 'add']);
        Route::post('/add', [ProductController::class, 'doCreate']);
        Route::get('/detail/{id}', [ProductController::class, 'detail']);
        Route::get(ENDPOINT_EDIT_BY_ID, [ProductController::class, 'update']);
        Route::post(ENDPOINT_DO_UPDATE_BY_ID, [ProductController::class, 'doUpdate']);
        Route::get(ENDPOINT_DELETE_BY_ID, [ProductController::class, 'doDelete']);
    });

    // PRODUCT CATEGORY
    Route::prefix('product_category')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('/add', [ProductCategoryController::class, 'add']);
        Route::post('/add', [ProductCategoryController::class, 'doCreate']);
        Route::get(ENDPOINT_EDIT_BY_ID, [ProductCategoryController::class, 'update']);
        Route::post(ENDPOINT_DO_UPDATE_BY_ID, [ProductCategoryController::class, 'doUpdate']);
        Route::get(ENDPOINT_DELETE_BY_ID, [ProductCategoryController::class, 'doDelete']);
    });
});
