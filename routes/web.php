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
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search-order', [HomeController::class, 'searchOrder'])->name('search_order');

//! Dashboard Routes:
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/{id}', [UserController::class, 'userProfile'])->name('user_profile');
    Route::get('user-permission/{id}', [UserController::class, 'user_permission'])->name('user_permission');
    Route::post('user-permission-save/{id}', [UserController::class, 'user_permission_save'])->name('user_permission_save');
    Route::get('branch-setup', [BranchController::class, 'branchSetup'])->name('branch_setup');
    Route::get('branch-user-setup/{id}', [UserController::class, 'branchUserSetup'])->name('branch_user_setup');
    Route::post('branch-user-setup-save/{id}', [UserController::class, 'branchUserSetupSave'])->name('branch_user_setup_save');

    Route::post('order-received/{id}', [CourierController::class, 'orderReceived'])->name('order_received');
    Route::get('order-received', [CourierController::class, 'ReceivedOrderList'])->name('order-received');
    Route::get('order-transfer/{id}', [CourierController::class, 'OrderTransfer'])->name('order-transfer');
    Route::post('order-transfer/{id}', [CourierController::class, 'OrderTransferSave'])->name('order-transfer');
    Route::get('order-transfer-list', [CourierController::class, 'OrderTransferList'])->name('order-transfer-list');
    Route::post('order-arrived_destination/{id}', [CourierController::class, 'orderArrivedDestination'])->name('order-arrived_destination');
    Route::get('order-delivery-list', [CourierController::class, 'OrderdeliveryList'])->name('order-delivery-list');
    Route::get('order-delivered/{id}', [CourierController::class, 'Orderdelivered'])->name('order-delivered');
    Route::post('order-delivered/{id}', [CourierController::class, 'OrderDeliveredSave'])->name('order-delivered');
    Route::get('order-complete', [CourierController::class, 'OrderComplete'])->name('order-complete');
    Route::post('order-complete-save/{id}', [CourierController::class, 'OrderCompleteSave'])->name('order-complete-save');
    Route::get('order-history', [CourierController::class, 'OrderHistory'])->name('order-history');

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