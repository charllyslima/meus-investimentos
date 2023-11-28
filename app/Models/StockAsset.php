<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeCVM',
        'issuingCompany',
        'companyName',
        'tradingName',
        'cnpj',
        'marketIndicator',
        'typeBDR',
        'dateListing',
        'status',
        'segment',
        'segmentEng',
        'type',
    ];
}
