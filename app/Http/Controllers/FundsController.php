<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use Illuminate\Http\Request;

class FundsController extends Controller
{
    public function list()
    {
        return Funds::all();
    }
}
