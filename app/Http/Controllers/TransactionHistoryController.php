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

        $totalDeposit = TransactionHistory::where('transaction_type', TransactionHistory::DEPOSIT)->sum('amount');

        $totalWithdraw = TransactionHistory::where('transaction_type', TransactionHistory::WITHDRAWAL)->sum('amount');

        $totalBalance = $totalDeposit - $totalWithdraw;

        return Inertia::render('TransactionHistories/List', [
            'transactionHistories' => $transactionHistories,
            'totalDeposit' => (float)$totalDeposit,
            'totalWithdraw' => (float)$totalWithdraw,
            'totalBalance' => (float)$totalBalance,
        ]);
    }

    public function create()
    {
        return Inertia::render('TransactionHistories/Form');
    }

    public function store(TransactionHistoryRequest $request)
    {
        TransactionHistory::create($request->validated());


        return redirect()->route('transaction');
    }

    public function edit(int $id)
    {

        $transactionHistory = TransactionHistory::find($id);

        return Inertia::render('TransactionHistories/Form', [
            'transactionHistory' => $transactionHistory,
            'id' => $id,
        ]);
    }

    public function update(TransactionHistoryRequest $request, int $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionHistory->update($request->validated());
        return redirect()->route('transaction');
    }

    public function destroy(int $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionHistory->delete();
        return redirect()->route('transaction');
    }
}
