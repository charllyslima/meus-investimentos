<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiAsset extends Model
{

    protected $table = 'fi_assets';

    public $timestamps = true;

    protected $fillable = ['acronym', 'fundName', 'companyName'];

}
