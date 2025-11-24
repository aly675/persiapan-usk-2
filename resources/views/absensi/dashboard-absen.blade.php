@extends('component.sidebar')

@section('title', 'Dashboard Abasensi')

@section('main')
    <div class="container-fluid p-0">
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" style="height: 9vh" href="{{ route('absensi.dashboard-absensi-page') }}">
                    <h3 class="text-white">
                        Absensi / Dashboard /
                    </h3>
                </a>
            </div>
        </nav>
        {{-- Content --}}
        <div class="container mx-0 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Dashboard Daftar Absensi</h1>
                <a class="btn btn-primary" href="{{ route('absensi.input-absensi-page') }}">
                    Tambah Absensi
                </a>
            </div>
            {{-- Filter Section --}}
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('absensi.dashboard-absensi-page') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ request('tanggal', date('Y-m-d')) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="kelas" class="form-label fw-semibold">Kelas</label>
                                <select name="kelas" id="kelas" class="form-select">
                                    <option value="">-- Semua Kelas --</option>
                                    <option value="x" {{ request('kelas') == 'x' ? 'selected' : '' }}>X</option>
                                    <option value="xi" {{ request('kelas') == 'xi' ? 'selected' : '' }}>XI</option>
                                    <option value="xii" {{ request('kelas') == 'xii' ? 'selected' : '' }}>XII</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-select">
                                    <option value="">-- Semua Jurusan --</option>
                                    <option value="RPL" {{ request('jurusan') == 'RPL' ? 'selected' : '' }}>RPL</option>
                                    <option value="BR" {{ request('jurusan') == 'BR' ? 'selected' : '' }}>BR</option>
                                    <option value="MP" {{ request('jurusan') == 'MP' ? 'selected' : '' }}>MP</option>
                                    <option value="AKL" {{ request('jurusan') == 'AKL' ? 'selected' : '' }}>AKL</option>
                                </select>
                            </div>
                        <div class="col-md-3 d-flex">
                            <button type="submit" class="btn btn-success me-2 w-100">
                                Filter
                            </button>
                            <a href="{{ route('absensi.dashboard-absensi-page') }}" class="btn btn-secondary w-100">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Table Section --}}
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Alasan</th>
                            <th>Guru Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensi as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->kelas }}</td>
                                <td>{{ $data->siswa->jurusan }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y H:i') }}</td>
                                <td>
                                    {{ $data->status_kehadiran }}
                                </td>
                                <td>{{ $data->alasan ?: '-' }}</td>
                                <td>{{ $data->guru->nama }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-3">
                                    <i class="fas fa-exclamation-circle me-2"></i>Tidak ada data absensi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
