
@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
<div class="container">
    <h1>Edit Data Pasien</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="medical_record_number">Nomor Rekam Medis</label>
            <input type="text" name="medical_record_number"
                id="medical_record_number" class="form-control"
                value="{{ old('medical_record_number', $pasien->medical_record_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="name">Nama Pasien</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', $pasien->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="L" {{ old('gender', $pasien->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender', $pasien->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="birth_date">Tanggal Lahir</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control"
                value="{{ old('birth_date', $pasien->birth_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="address">Alamat</label>
            <textarea name="address" id="address" class="form-control">{{ old('address', $pasien->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" class="form-control"
                value="{{ old('phone', $pasien->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection