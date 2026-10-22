<?php

namespace App\Http\Controllers;

use App\Models\Poli;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::with('doctors')->get();

        return view('poli.index', compact('polis'));
    }
}
