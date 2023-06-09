<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
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


Auth::routes();

Route::resource('member', MemberController::class);
Route::resource('payment', PaymentController::class);
Route::post('payment/{member}', [PaymentController::class,'store'])->name('payment.store');
Route::get('/', [App\Http\Controllers\MemberController::class, 'index']);
