
@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')
<div class="container">
    <h1>Tambah Dokter</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf

        <div>
            <label for="doctor_code">Kode Dokter</label><br>
            <input
                type="text"
                id="doctor_code"
                name="doctor_code"
                value="{{ old('doctor_code') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="name">Nama Dokter</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="specialization">Spesialisasi</label><br>
            <input
                type="text"
                id="specialization"
                name="specialization"
                value="{{ old('specialization') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="phone">Telepon</label><br>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
            >
        </div>

        <br>

        <div>
            <label for="poli_id">Poli</label><br>
            <select id="poli_id" name="poli_id" required>
                <option value="">-- Pilih Poli --</option>

                @foreach ($polis as $poli)
                    <option
                        value="{{ $poli->id }}"
                        {{ old('poli_id') == $poli->id ? 'selected' : '' }}
                    >
                        {{ $poli->code }} - {{ $poli->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label for="is_active">Status</label><br>
            <select id="is_active" name="is_active" required>
                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Simpan Dokter</button>
        <a href="{{ route('dokter.index') }}">Batal</a>
    </form>
</div>
@endsection
