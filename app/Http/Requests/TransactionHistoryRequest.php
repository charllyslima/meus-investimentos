<?php

namespace App\Http\Requests;

use App\Models\TransactionHistory;
use Illuminate\Foundation\Http\FormRequest;

class TransactionHistoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:0.01',
            'transaction_type' => "required|in:" . TransactionHistory::DEPOSIT . "," . TransactionHistory::WITHDRAWAL,
            'operation_date' => 'required|date'
        ];
    }
}
