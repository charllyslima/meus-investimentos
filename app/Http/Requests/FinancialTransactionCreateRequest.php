<?php

namespace App\Http\Requests;

use App\Models\FinancialTransaction;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FinancialTransactionCreateRequest extends FormRequest
{

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData(): array
    {
        $this->merge(['user_id' => Auth::id()]);

        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user_id = Auth::id();

        return [
            'user_id' => 'required|exists:users,id|in:' . $user_id,
            'amount' => 'required|numeric|min:0.01',
            'transaction_type' => "required|in:" . FinancialTransaction::DEPOSIT . "," . FinancialTransaction::WITHDRAWAL,
            'transaction_date' => 'required|date'
        ];
    }
}
