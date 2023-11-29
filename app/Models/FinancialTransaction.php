<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransaction extends Model
{
    const WITHDRAWAL = 'WITHDRAWAL';
    const DEPOSIT = 'DEPOSIT';
    const INVESTMENT = 'INVESTMENT';

    protected $fillable = ['user_id', 'transaction_type', 'amount', 'transaction_date'];

    protected $hidden = ['user_id'];

    protected $attributes = [
        'transaction_date' => 'Data da Operacao',
        'amount' => 'Valor',
        'transaction_type' => 'Tipo de Operação',
    ];
}
