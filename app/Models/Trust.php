<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trust extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['acronym', 'fundName', 'companyName'];

}
