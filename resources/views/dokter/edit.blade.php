@extends('layouts.app')

@section('title', 'Edit Dokter')

@section('content')
<div class="container">
    <h1>Edit Dokter</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="doctor_code">Kode Dokter</label>
            <input type="text" id="doctor_code" name="doctor_code"
                   class="form-control"
                   value="{{ old('doctor_code', $doctor->doctor_code) }}" required>
        </div>

        <div class="mb-3">
            <label for="name">Nama Dokter</label>
            <input type="text" id="name" name="name"
                   class="form-control"
                   value="{{ old('name', $doctor->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="specialization">Spesialisasi</label>
            <input type="text" id="specialization" name="specialization"
                   class="form-control"
                   value="{{ old('specialization', $doctor->specialization) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone"
                   class="form-control"
                   value="{{ old('phone', $doctor->phone) }}">
        </div>

        <div class="mb-3">
            <label for="poli_id">Poli</label>
            <select id="poli_id" name="poli_id" class="form-control" required>
                <option value="">-- Pilih Poli --</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}"
                        @selected(old('poli_id', $doctor->poli_id) == $poli->id)>
                        {{ $poli->code }} - {{ $poli->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_active">Status</label>
            <select id="is_active" name="is_active" class="form-control" required>
                <option value="1" @selected(old('is_active', $doctor->is_active ? '1' : '0') == '1')>Aktif</option>
                <option value="0" @selected(old('is_active', $doctor->is_active ? '1' : '0') == '0')>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection