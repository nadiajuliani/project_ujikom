@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                        <h6 class="text-white text-capitalize m-0">Tambah Jadwal</h6>
                    </div>
                </div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('admin.jadwal.store') }}" enctype="multipart/form-data">
                         @csrf
                        <div class="mb-3">
                            <label for="eskul_id" class="form-label">Ekstrakurikuler</label>
                            <select class="form-select" id="eskul_id" name="eskul_id" required>
                                <option value="">Pilih Ekstrakurikuler</option>
                                @foreach ($eskuls as $eskul)
                                    <option value="{{ $eskul->id }}">{{ $eskul->nama_eskul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="hari" name="hari" placeholder="Tambah Hari" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
