<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Http\Requests\TransactionHistoryRequest;
use Inertia\Inertia;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transactionHistories = TransactionHistory::all();
        return Inertia::render('TransactionHistories/List', [
            'transactionHistories' => $transactionHistories,
        ]);
    }

    public function create()
    {
        return Inertia::render('TransactionHistories/Form');
    }

    public function store(TransactionHistoryRequest $request)
    {
        TransactionHistory::create($request->validated());


        return redirect()->route('transaction.index');
    }

    public function edit(TransactionHistory $transactionHistory)
    {
        return Inertia::render('TransactionHistories/Edit', [
            'transactionHistory' => $transactionHistory,
        ]);
    }

    public function update(TransactionHistoryRequest $request, TransactionHistory $transactionHistory)
    {
        $transactionHistory->update($request->validated());
        return redirect()->route('transaction-histories.index');
    }

    public function destroy(TransactionHistory $transactionHistory)
    {
        $transactionHistory->delete();
        return redirect()->route('transaction-histories.index');
    }
}
