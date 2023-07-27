<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

// Supplier Route
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'supplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'supplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'supplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'supplierEdit')->name('supplier.edit');
    Route::post('/supplier/update', 'supplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'supplierDelete')->name('supplier.delete');
});

// Customer Route
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'customerAll')->name('customer.all');
    Route::get('/customer/add', 'customerAdd')->name('customer.add');
    Route::post('/customer/store', 'customerStore')->name('customer.store');
    Route::get('/customer/edit/{id}', 'customerEdit')->name('customer.edit');
    Route::post('/customer/update', 'customerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'customerDelete')->name('customer.delete');
});

require __DIR__ . '/auth.php';
