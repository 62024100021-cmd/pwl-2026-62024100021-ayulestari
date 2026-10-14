<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index()
    {
        $judul = 'Data Pasien';
        $jumlahPasien = Patient::count();
        $patients = Patient::latest()->get();

        return view('pasien.index', compact(
            'judul',
            'jumlahPasien',
            'patients'
        ));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_record_number' => 'required|string|unique:patients,medical_record_number',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Patient $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function edit(Patient $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Patient $pasien)
    {
        $validated = $request->validate([
            'medical_record_number' => [
                'required',
                'string',
                Rule::unique('patients', 'medical_record_number')
                    ->ignore($pasien->id),
            ],
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $pasien->update($validated);

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Patient $pasien)
    {
        $pasien->delete();

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
}