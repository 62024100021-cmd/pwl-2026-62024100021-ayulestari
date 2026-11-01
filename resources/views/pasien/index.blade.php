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

    {{-- ===== FORM PENCARIAN, FILTER, DAN SORTING ===== --}}
    <form method="GET" action="{{ route('pasien.index') }}" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Cari nama / No. Rekam Medis">
        </div>

        <div class="col-md-2">
            <select name="gender" class="form-select">
                <option value="">Semua Gender</option>
                <option value="L" @selected(request('gender') === 'L')>Laki-laki</option>
                <option value="P" @selected(request('gender') === 'P')>Perempuan</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="name" @selected(request('sort', 'name') === 'name')>Nama</option>
                <option value="medical_record_number" @selected(request('sort') === 'medical_record_number')>No. Rekam Medis</option>
                <option value="created_at" @selected(request('sort') === 'created_at')>Tanggal Input</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="direction" class="form-select">
                <option value="asc" @selected(request('direction', 'asc') === 'asc')>A-Z / Terlama</option>
                <option value="desc" @selected(request('direction') === 'desc')>Z-A / Terbaru</option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Terapkan</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- ===== BARU: INFORMASI HASIL (pakai total() dan count()) ===== --}}
    <p>
        Menampilkan {{ $patients->count() }} dari {{ $patients->total() }} data
        @if (request('search'))
            untuk pencarian <strong>{{ request('search') }}</strong>
        @endif
        @if (request('gender'))
            dengan jenis kelamin
            <strong>{{ request('gender') === 'L' ? 'Laki-laki' : 'Perempuan' }}</strong>
        @endif
        .
    </p>

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
                    {{-- BARU: nomor urut berlanjut antar halaman --}}
                    <td>{{ $patients->firstItem() + $loop->index }}</td>
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
                        @if (request('search') || request('gender'))
                            Tidak ada pasien yang sesuai dengan pencarian atau filter.
                        @else
                            Belum ada data pasien.
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ===== BARU: TOMBOL HALAMAN ===== --}}
    <div class="mt-3">
        {{ $patients->links() }}
    </div>
</div>
@endsection