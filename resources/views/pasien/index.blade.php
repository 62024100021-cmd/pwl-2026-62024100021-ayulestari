@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<div class="container">
    <h1>Data Pasien</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">
        Tambah Pasien
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Rekam Medis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->medical_record_number }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->birth_date }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $patient->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('pasien.destroy', $patient->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        Belum ada data pasien.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection