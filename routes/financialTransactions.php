<?php

use App\Http\Controllers\FinancialTransactionsController;

Route::middleware('auth')->group(function () {
    Route::get('/financial-transaction', [FinancialTransactionsController::class, 'index'])->name('financial.transaction');
    Route::get('/financial-transaction/create', [FinancialTransactionsController::class, 'create'])->name('financial.transaction.create');
    Route::post('/financial-transaction/create', [FinancialTransactionsController::class, 'store'])->name('financial.transaction.create');
    Route::get('/financial-transaction/edit/{id}', [FinancialTransactionsController::class, 'edit'])->name('financial.transaction.edit')->where('id', '[0-9]+');
    Route::put('/financial-transaction/edit/{id}', [FinancialTransactionsController::class, 'update'])->name('financial.transaction.update')->where('id', '[0-9]+');
    Route::delete('/financial-transaction/destroy/{id}', [FinancialTransactionsController::class, 'destroy'])->name('financial.transaction.destroy')->where('id', '[0-9]+');
});
