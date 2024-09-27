<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MerchantController;

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

route::get('/sign-up', [AuthController::class,'SignUp'])->name('sign-up');
route::post('/sign-up', [AuthController::class,'storeSignUp'])->name('store-sign-up');

route::get('/sign-in', [AuthController::class,'SignIn'])->name('sign-in');
route::post('/sign-in', [AuthController::class,'storeSignIn'])->name('store-sign-in');

Route::get('/menu', [MenuController::class,'menu'])->name('menu');
Route::post('/menu', [MenuController::class,'store'])->name('menu-store');
Route::delete('/menu/{id}', [MenuController::class, 'delete'])->name('delete-menu');
Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit-menu');
Route::put('/update/{id}', [MenuController::class, 'update'])->name('update-menu');

Route::get('/invoice-index', [MenuController::class, 'invoiceIndex'])->name('invoice-index');
Route::get('/invoice/{order_id}', [MenuController::class, 'invoice'])->name('invoice');
Route::get('/profile', [MenuController::class, 'profile'])->name('profile');


Route::post('/order', [MenuController::class, 'order'])->name('order-store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


