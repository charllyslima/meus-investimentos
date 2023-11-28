<?php

namespace App\Http\Controllers;

use App\Models\FinancialTransaction;
use App\Http\Requests\FinancialTransactionCreateRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FinancialTransactionsController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $financialTransactions = FinancialTransaction::where('user_id', $user_id)->get();

        $totalDeposit = FinancialTransaction::where('user_id', $user_id)
            ->where('transaction_type', FinancialTransaction::DEPOSIT)
            ->sum('amount');

        $totalWithdraw = FinancialTransaction::where('user_id', $user_id)
            ->where('transaction_type', FinancialTransaction::WITHDRAWAL)
            ->sum('amount');

        $totalBalance = $totalDeposit - $totalWithdraw;

        return Inertia::render('FinancialTransaction/FinancialTransactionList', [
            'financialTransactions' => $financialTransactions,
            'totalDeposit' => (float)$totalDeposit,
            'totalWithdraw' => (float)$totalWithdraw,
            'totalBalance' => (float)$totalBalance,
        ]);
    }

    public function create()
    {
        return Inertia::render('FinancialTransaction/FinancialTransactionCreate');
    }

    public function store(FinancialTransactionCreateRequest $request)
    {

        FinancialTransaction::create($request->validated());

        return redirect()->route('transaction');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id)
    {
        try {
            $transactionHistory = FinancialTransaction::findOrFail($id);

            if ($transactionHistory->user_id != Auth::id()) {
                throw new Exception('Você não tem permissão para acessar este registro.');
            }
            return Inertia::render('FinancialTransaction/FinancialTransactionEdit', [
                'financialTransaction' => $transactionHistory
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('transaction');
        }
    }

    public function update(FinancialTransactionCreateRequest $request, int $id)
    {
        try {
            $transactionHistory = FinancialTransaction::findOrFail($id);
            if ($transactionHistory->user_id != Auth::id()) {
                throw new Exception('Você não tem permissão para acessar este registro.');
            }
            $transactionHistory->update($request->validated());
            return redirect()->route('transaction');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('transaction');
        }

    }

    public function destroy(int $id)
    {
        $transactionHistory = FinancialTransaction::findOrFail($id);
        $transactionHistory->delete();
        return redirect()->route('transaction');
    }
}
