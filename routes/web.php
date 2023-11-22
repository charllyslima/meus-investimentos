<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundsController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionHistoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/transactions', [TransactionHistoryController::class, 'index'])->name('transaction');
    Route::get('/transactions/create', [TransactionHistoryController::class, 'create'])->name('transaction.create');
    Route::post('/transactions/create', [TransactionHistoryController::class, 'store'])->name('transaction.create');
    Route::get('/transactions/edit/{id}', [TransactionHistoryController::class, 'edit'])->name('transaction.edit');
    Route::put('/transactions/edit/{id}', [TransactionHistoryController::class, 'update'])->name('transaction.update');
    Route::delete('/transactions/destroy/{id}', [TransactionHistoryController::class, 'destroy'])->name('transaction.destroy');

    Route::get('/operations', [OperationController::class, 'index'])->name('operation');
    Route::get('/operations/create', [OperationController::class, 'create'])->name('operation.create');
    Route::post('/operations/create', [OperationController::class, 'store'])->name('operation.create');
    Route::get('/operations/edit', [OperationController::class, 'edit'])->name('operation.edit');
    Route::put('/operations/edit', [OperationController::class, 'update'])->name('operation.update');
    Route::delete('/operations/destroy/{id}', [OperationController::class, 'destroy'])->name('operation.destroy');

});

require __DIR__ . '/auth.php';
