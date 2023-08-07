<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;

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
    Route::get('/supplier/ajax', 'getSupplier')->name('supplier.ajax');
    Route::get('/supplier/add', 'supplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'supplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'supplierEdit')->name('supplier.edit');
    Route::post('/supplier/update', 'supplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'supplierDelete')->name('supplier.delete');
});

// Customer Route
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'customerAll')->name('customer.all');
    Route::get('/customer/ajax', 'getCustomer')->name('customer.ajax');
    Route::get('/customer/add', 'customerAdd')->name('customer.add');
    Route::post('/customer/store', 'customerStore')->name('customer.store');
    Route::get('/customer/edit/{id}', 'customerEdit')->name('customer.edit');
    Route::post('/customer/update', 'customerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'customerDelete')->name('customer.delete');
});

// Unit Routes
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'unitAll')->name('unit.all');
    Route::get('/unit/ajax', 'getAjax')->name('unit.ajax');
    Route::get('/unit/add', 'unitAdd')->name('unit.add');
    Route::post('/unit/store', 'unitStore')->name('unit.store');
    Route::get('/unit/edit/{id}', 'unitEdit')->name('unit.edit');
    Route::post('/unit/update', 'unitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'unitDelete')->name('unit.delete');
});

// Category Routes
Route::controller(CategoryController::class)->group(function() {
    Route::get('/category/all', 'categoryAll')->name('category.all');
    Route::get('/category/ajax', 'getCategory')->name('category.ajax');
    Route::get('/category/add', 'categoryAdd')->name('category.add');
    Route::post('/category/store', 'categoryStore')->name('category.store');
    Route::get('/category/edit/{id}', 'categoryEdit')->name('category.edit');
    Route::post('/category/update', 'categoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'categoryDelete')->name('category.delete');
});

// Product Routes
Route::controller(ProductController::class)->group(function() {
    Route::get('/product/all', 'ProductAll')->name('product.all');
    Route::get('/product/ajax', 'getProduct')->name('product.ajax');
    Route::get('/product/add', 'productAdd')->name('product.add');
    Route::post('/product/store', 'productStore')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
});

Route::controller(PurchaseController::class)->group(function() {
    Route::get('/purchase/all', 'purchaseAll')->name('purchase.all');
    Route::get('/purchase/ajax', 'getPurchase')->name('purchase.ajax');
    Route::get('/purchase/add', 'purchaseAdd')->name('purchase.add');
});

Route::controller(DefaultController::class)->group(function() {
    Route::get('/get-category', 'GetCategories')->name('get-category');
    Route::get('/get-product', 'GetProducts')->name('get-product');
});

require __DIR__ . '/auth.php';
