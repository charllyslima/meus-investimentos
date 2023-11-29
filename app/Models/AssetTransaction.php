<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'fi_asset_id', 'stock_asset_id', 'asset_code', 'transaction_type', 'quantity', 'price', 'transaction_date'];

    protected $hidden = ['user_id'];
}
