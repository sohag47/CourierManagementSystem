<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//! import controller 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PriceController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//! Dashboard Routes:
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/{id}', [UserController::class, 'userProfile'])->name('user_profile');
    Route::get('user-permission/{id}', [UserController::class, 'user_permission'])->name('user_permission');
    Route::post('user-permission-save/{id}', [UserController::class, 'user_permission_save'])->name('user_permission_save');
    Route::get('branch-setup', [BranchController::class, 'branchSetup'])->name('branch_setup');
    Route::get('branch-user-setup/{id}', [UserController::class, 'branchUserSetup'])->name('branch_user_setup');
    Route::post('branch-user-setup-save/{id}', [UserController::class, 'branchUserSetupSave'])->name('branch_user_setup_save');

    //? Resource Routes:
    Route::resources([
        'role' => RoleController::class,
        'user' => UserController::class,
        'user-role' => UserRoleController::class,
        'branch' => BranchController::class,
        'courier' => CourierController::class,
        'address' => AddressController::class,
        'price' => PriceController::class
    ]);
});