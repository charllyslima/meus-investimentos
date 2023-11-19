<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBalance = TransactionHistory::selectRaw('SUM(CASE WHEN transaction_type = ? THEN amount ELSE -amount END) as total_balance', [TransactionHistory::DEPOSIT])
            ->value('total_balance');

        return Inertia::render('Dashboard', [
            'totalInvested' => (float)$totalBalance,
        ]);
    }
}
