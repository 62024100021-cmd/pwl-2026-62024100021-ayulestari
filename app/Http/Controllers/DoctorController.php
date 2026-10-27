<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('poli')->get();

        return view('dokter.index', compact('doctors'));
    }

    public function create()
    {
        $polis = Poli::where('is_active', true)->get();

        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code' => ['required', 'string', 'max:255', 'unique:doctors,doctor_code'],
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'is_active' => ['required', 'boolean'],
            'poli_id' => ['required', 'exists:polis,id'],
        ]);

        Doctor::create($validated);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }

    // ===== BARU (A2): mulai dari sini =====

    public function edit(Doctor $doctor)
    {
        $polis = Poli::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('dokter.edit', compact('doctor', 'polis'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'doctor_code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('doctors', 'doctor_code')->ignore($doctor->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'is_active' => ['required', 'boolean'],
            'poli_id' => ['required', 'exists:polis,id'],
        ]);

        $doctor->update($validated);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    // ===== BARU (A2): sampai sini =====
}