<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

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
Route::get('/', [Controllers\UserController::class, 'loginPage'])->name('login-page');
Route::post('login', [Controllers\UserController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('logout', [Controllers\UserController::class, 'logout'])->name('logout');
    Route::get('dashboard', [Controllers\PageController::class, 'dashboard'])->name('dashboard');
    Route::post('get-report', [Controllers\ReportController::class, 'getReport'])->name('get.report');
    Route::get('report', [Controllers\ReportController::class, 'report'])->name('report');
    Route::resource('expenses', Controllers\ExpenseController::class);
    Route::get('expense-list', [Controllers\ExpenseController::class, 'getExpenses'])->name('expense.list');
    Route::get('warehouse-expenses', [Controllers\ExpenseController::class, 'warehouseExpense'])->name('warehouse.expense');
    Route::get('warehouse-list', [Controllers\ExpenseController::class, 'getWarehouse'])->name('warehouse.list');
    Route::get('create-warehouse-expense', [Controllers\ExpenseController::class, 'createWarehouse'])->name('create.warehouse.expense');
    Route::get('edit-warehouse-expense/{expense}', [Controllers\ExpenseController::class, 'editWarehouse'])->name('edit.warehouse.expense');
    
    Route::middleware('admin')->group(function () {
        Route::get('expense-delete/{expense}', [Controllers\ExpenseController::class, 'destroy'])->name('expenses.delete');
        Route::resource('users', Controllers\UserController::class);
        Route::post('users/search', [Controllers\UserController::class, 'search'])->name('users.search');
    });

    Route::get('account', [Controllers\UserController::class, 'account'])->name('users.account');
});

