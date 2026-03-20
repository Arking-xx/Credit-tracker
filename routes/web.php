<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index'], [CustomerTransactionController::class, 'index']);

// custom route
Route::get('/customers-list', [CustomerController::class, 'customer'])->name('customers.customer');
Route::delete('customers/delete-multiple', [CustomerController::class, 'deleteMultipleCustomersTransaction'])->name('customers.deleteMultipleCustomersTransaction');

Route::resource('customers', CustomerController::class);
Route::resource('transactions', CustomerTransactionController::class);
