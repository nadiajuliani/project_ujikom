@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                <h4 class="mb-0">Jadwal Ekstrakurikuler</h4>
                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
            </div>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                        <h6 class="text-white text-capitalize m-0">Tabel Jadwal Ekstrakurikuler</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hari</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ekstrakurikuler</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Mulai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Selesai</th>
                                    <th class="text-secondary opacity-7 ps-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwal as $item)
                                    <tr>
                                        <td class="ps-3">{{ $loop->iteration }}</td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ $item->eskul->nama_eskul }}</td>
                                        <td>{{ $item->jam_mulai }}</td>
                                        <td>{{ $item->jam_selesai }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('admin.jadwal.edit', $item) }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('admin.jadwal.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">Belum ada jadwal ekstrakurikuler.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
