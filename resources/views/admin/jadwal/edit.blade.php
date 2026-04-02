@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                        <h6 class="text-white text-capitalize m-0">Edit Jadwal</h6>
                    </div>
                </div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="eskul_id" class="form-label">Ekstrakurikuler</label>
                                <select class="form-select" id="eskul_id" name="eskul_id" required>
                                    <option value="">Pilih Ekstrakurikuler</option>
                                    @foreach ($eskuls as $eskul)
                                        <option value="{{ $eskul->id }}"
                                            {{ $jadwal->eskul_id == $eskul->id ? 'selected' : '' }}>{{ $eskul->nama_eskul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" id="hari" name="hari"
                                    value="{{ $jadwal->hari }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    value="{{ $jadwal->jam_mulai }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                    value="{{ $jadwal->jam_selesai }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
