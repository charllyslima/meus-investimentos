<?php

namespace Database\Seeders;

use App\Models\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['operation_date' => '2020-08-19', 'amount' => 500.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2020-08-19', 'amount' => 1000.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2020-10-05', 'amount' => 400.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-05-02', 'amount' => 250.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-06-03', 'amount' => 200.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-06-06', 'amount' => 200.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-06-17', 'amount' => 161.00, 'transaction_type' => 'withdrawal'],
            ['operation_date' => '2022-07-01', 'amount' => 116.17, 'transaction_type' => 'withdrawal'],
            ['operation_date' => '2022-07-04', 'amount' => 300.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-07-04', 'amount' => 1000.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-09-15', 'amount' => 314.03, 'transaction_type' => 'withdrawal'],
            ['operation_date' => '2022-10-21', 'amount' => 30.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-10-14', 'amount' => 132.69, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-10-05', 'amount' => 300.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-10-05', 'amount' => 204.83, 'transaction_type' => 'withdrawal'],
            ['operation_date' => '2022-11-30', 'amount' => 208.23, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-12-01', 'amount' => 300.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2022-12-14', 'amount' => 300.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-01-05', 'amount' => 400.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-01-09', 'amount' => 540.12, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-01-25', 'amount' => 50.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-02-03', 'amount' => 400.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-02-06', 'amount' => 540.12, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-03-02', 'amount' => 536.57, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-03-03', 'amount' => 200.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-04-04', 'amount' => 927.46, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-05-05', 'amount' => 500.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-05-12', 'amount' => 500.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-06-06', 'amount' => 886.92, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-07-04', 'amount' => 1791.49, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-07-06', 'amount' => 383.56, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-08-04', 'amount' => 2000.00, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-08-04', 'amount' => 674.14, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-09-04', 'amount' => 1907.20, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-10-03', 'amount' => 1927.09, 'transaction_type' => 'deposit'],
            ['operation_date' => '2023-11-06', 'amount' => 1948.06, 'transaction_type' => 'deposit'],
        ];

        foreach ($data as $transaction) {
            TransactionHistory::create([
                'amount' => $transaction['amount'],
                'transaction_type' => $transaction['transaction_type'],
                'operation_date' => Carbon::parse($transaction['operation_date']),
            ]);
        }
    }
}
