@extends('layouts.app')

@section('title', 'Poli')

@section('content')
<div class="container">
    <h1>Data Poli</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Poli</th>
                <th>Nama Poli</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Jumlah Dokter</th>
                <th>Dokter</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($polis as $poli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $poli->code }}</td>
                    <td>{{ $poli->name }}</td>
                    <td>{{ $poli->description ?? '-' }}</td>
                    <td>{{ $poli->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $poli->doctors->count() }}</td>
                    <td>
                        @forelse ($poli->doctors as $doctor)
                            {{ $doctor->name }}@if (!$loop->last), @endif
                        @empty
                            Belum ada dokter
                        @endforelse
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data poli.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
