@extends('layouts.app')

@section('title', 'Detail Poli')

@section('content')
<div class="container">
    <h1>Detail Poli</h1>

    <table class="table table-bordered w-50">
        <tr>
            <th style="width: 30%">Kode Poli</th>
            <td>{{ $poli->code }}</td>
        </tr>
        <tr>
            <th>Nama Poli</th>
            <td>{{ $poli->name }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $poli->description ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if ($poli->is_active)
                    <span class="badge text-bg-success">Aktif</span>
                @else
                    <span class="badge text-bg-secondary">Tidak Aktif</span>
                @endif
            </td>
        </tr>
    </table>

    <h4 class="mt-4">Daftar Dokter di {{ $poli->name }}</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>No. Telepon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($poli->doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->doctor_code }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->phone ?? '-' }}</td>
                    <td>
                        @if ($doctor->is_active)
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada dokter di poli ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection