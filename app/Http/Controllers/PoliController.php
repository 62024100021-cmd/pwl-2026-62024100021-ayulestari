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

    // ===== BARU (B2): mulai dari sini =====

    public function show(Poli $poli)
    {
        $poli->load('doctors');

        return view('poli.show', compact('poli'));
    }

    // ===== BARU (B2): sampai sini =====
}