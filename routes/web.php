<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/admin', function () {
    return view('dashboard.admin');
});
//  -----------------------routes for users -----------------------
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/register', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/reset/{id}', [UserController::class, 'update'])->name('users.update');

});
//----------------------routes for roles -------------------------
Route::group(['prefix' => 'roles'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');

    Route::get('create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');

});
//----------------------routes for permissions -------------------------
Route::group(['prefix' => 'permissions'], function () {
    Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');

    Route::get('create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::post('/update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update');
    Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');

});
// -------------------------authentication ---------------------------------------
Route::post('/register', [UserController::class, 'register'])->name('users.register');

Route::get('/', function () {
    return view('auth.register');
});
