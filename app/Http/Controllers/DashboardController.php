<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Poli;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = Patient::count();
        $jumlahDokter = Doctor::count();
        $jumlahPoli   = Poli::count();

        return view('dashboard', compact(
            'jumlahPasien',
            'jumlahDokter',
            'jumlahPoli'
        ));
    }
}