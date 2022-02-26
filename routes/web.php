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

Route::get('dashboard', [Controllers\PageController::class, 'dashboard'])->name('dashboard');
Route::resource('expenses', Controllers\ExpenseController::class);
Route::get('expense-list', [Controllers\ExpenseController::class, 'getExpenses'])->name('expense.list');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
