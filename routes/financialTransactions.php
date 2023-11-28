<?php

use App\Http\Controllers\FinancialTransactionsController;

Route::middleware('auth')->group(function () {
    Route::get('/transactions', [FinancialTransactionsController::class, 'index'])->name('transaction');
    Route::get('/transactions/create', [FinancialTransactionsController::class, 'create'])->name('transaction.create');
    Route::post('/transactions/create', [FinancialTransactionsController::class, 'store'])->name('transaction.create');
    Route::get('/transactions/edit/{id}', [FinancialTransactionsController::class, 'edit'])->name('transaction.edit')->where('id', '[0-9]+');
    Route::put('/transactions/edit/{id}', [FinancialTransactionsController::class, 'update'])->name('transaction.update')->where('id', '[0-9]+');
    Route::delete('/transactions/destroy/{id}', [FinancialTransactionsController::class, 'destroy'])->name('transaction.destroy')->where('id', '[0-9]+');
});
