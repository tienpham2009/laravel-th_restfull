<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.all');
Route::get('/customers/{customerId}', [CustomerController::class, 'show'])->name('customers.show');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/{customerId}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customerId}', [CustomerController::class, 'destroy'])->name('customers.destroy');

