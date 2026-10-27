@extends('layouts.app')

@section('title', 'Data Poli')

@section('content')
<div class="container">
    <h1>Data Poli</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Link tombol di halaman ini masih "#" karena route create/show/edit/destroy poli belum dibuat --}}
    <a href="#" class="btn btn-primary mb-3">Tambah Poli</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Poli</th>
                <th>Nama Poli</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($polis as $poli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $poli->code }}</td>
                    <td>{{ $poli->name }}</td>
                    <td>{{ $poli->description ?? '-' }}</td>
                    <td>
                        @if ($poli->is_active)
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('poli.show', $poli->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data poli.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection