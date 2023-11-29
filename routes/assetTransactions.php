<?php

use App\Http\Controllers\AssetTransactionsController;

Route::middleware('auth')->group(function () {
    Route::get('/asset-transaction', [AssetTransactionsController::class, 'index'])->name('asset.transaction');
    Route::get('/asset-transaction/create', [AssetTransactionsController::class, 'create'])->name('asset.transaction.create');
    Route::post('/asset-transaction/create', [AssetTransactionsController::class, 'store'])->name('asset.transaction.create');
    Route::get('/asset-transaction/edit/{id}', [AssetTransactionsController::class, 'edit'])->name('asset.transaction.edit')->where('id', '[0-9]+');
    Route::put('/asset-transaction/edit/{id}', [AssetTransactionsController::class, 'update'])->name('asset.transaction.update')->where('id', '[0-9]+');
    Route::delete('/asset-transaction/destroy/{id}', [AssetTransactionsController::class, 'destroy'])->name('asset.transaction.destroy')->where('id', '[0-9]+');
});
