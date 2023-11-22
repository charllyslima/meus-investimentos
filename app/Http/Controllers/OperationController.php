<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OperationController extends Controller
{

    public function index()
    {
        //TODO: implement
        return Inertia::render('Operations/List');
    }

    public function create()
    {
        $funds = Funds::all();

        return Inertia::render('Operations/Form', [
            'funds' => $funds
        ]);
    }

    public function store()
    {
        //TODO: implement
    }

    public function edit(int $id)
    {
        //TODO: implement
        $funds = Funds::all();

        return Inertia::render('Operations/Form', [
            'funds' => $funds,
            'id' => $id
        ]);
    }

    public function update()
    {
        //TODO: implement
    }

    public function destroy()
    {
        //TODO: implement
    }

}
