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

    {{-- ===== FORM PENCARIAN, FILTER, DAN SORTING ===== --}}
    <form method="GET" action="{{ route('dokter.index') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Cari nama / kode dokter">
        </div>

        <div class="col-md-2">
            <select name="poli_id" class="form-select">
                <option value="">Semua Poli</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}"
                        @selected(request('poli_id') == $poli->id)>
                        {{ $poli->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="1" @selected(request('status') === '1')>Aktif</option>
                <option value="0" @selected(request('status') === '0')>Tidak Aktif</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="name" @selected(request('sort', 'name') === 'name')>Nama</option>
                <option value="doctor_code" @selected(request('sort') === 'doctor_code')>Kode Dokter</option>
            </select>
        </div>

        <div class="col-md-1">
            <select name="direction" class="form-select">
                <option value="asc" @selected(request('direction', 'asc') === 'asc')>A-Z</option>
                <option value="desc" @selected(request('direction') === 'desc')>Z-A</option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Terapkan</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- INFORMASI HASIL --}}
    <p>
        Menampilkan {{ $doctors->count() }} dari {{ $doctors->total() }} data
        @if (request('search'))
            untuk pencarian <strong>{{ request('search') }}</strong>
        @endif
        .
    </p>

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
                    <td>{{ $doctors->firstItem() + $loop->index }}</td>
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
                    <td colspan="8" class="text-center">
                        @if (request('search') || request('poli_id') || request('status') !== null && request('status') !== '')
                            Tidak ada dokter yang sesuai dengan pencarian atau filter.
                        @else
                            Belum ada data dokter.
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $doctors->links() }}
    </div>
</div>
@endsection