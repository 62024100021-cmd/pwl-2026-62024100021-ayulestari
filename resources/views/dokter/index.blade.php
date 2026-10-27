@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')
<div class="container">
    <h1>Data Dokter</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">
        Tambah Dokter
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Poli</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->doctor_code }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->poli?->name ?? '-' }}</td>
                    <td>{{ $doctor->phone ?? '-' }}</td>
                    <td>
                        @if ($doctor->is_active)
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dokter.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data dokter.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection