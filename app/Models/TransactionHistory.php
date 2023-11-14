<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'operation_date', 'transaction_type'];

    protected $attributes = [
        'operation_date' => 'Data da Operacao',
        'amount' => 'Valor',
        'transaction_type' => 'Tipo de Operação',
    ];
}
