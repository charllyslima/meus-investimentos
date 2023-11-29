<?php

namespace App\Http\Controllers;

use App\Models\AssetTransaction;
use App\Models\FiAsset;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssetTransactionsController extends Controller
{
    public function index()
    {
        return Inertia::render('AssetTransaction/AssetTransactionList', [
            'founds' => FiAsset::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('AssetTransaction/AssetTransactionCreate', [
            'founds' => FiAsset::all()
        ]);
    }

    public function store(Request $request)
    {

    }


    public function edit(int $id)
    {
        $assetTransaction = AssetTransaction::findOrFail($id);

        return Inertia::render('AssetTransaction/AssetTransactionEdit', [
            'founds' => FiAsset::all(),
            'assetTransaction' => $assetTransaction
        ]);
    }

    public function update(Request $request, int $id)
    {

    }

    public function destroy(int $id)
    {

    }
}
