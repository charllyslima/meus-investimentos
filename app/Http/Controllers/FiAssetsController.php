<?php

namespace App\Http\Controllers;

use App\Models\FiAsset;
use Illuminate\Http\Request;

class FiAssetsController extends Controller
{
    public function list()
    {
        return FiAsset::all();
    }
}
