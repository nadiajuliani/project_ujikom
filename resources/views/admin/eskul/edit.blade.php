@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                        <h6 class="text-white text-capitalize m-0">Edit Ekstrakurikuler</h6>
                    </div>
                </div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('admin.eskul.update', $eskul) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_eskul" class="form-label">Nama Ekstrakurikuler</label>
                            <input type="text" class="form-control" id="nama_eskul" name="nama_eskul" value="{{ $eskul->nama_eskul }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_pembina" class="form-label">Nama Pembina</label>
                            <input type="text" class="form-control" id="nama_pembina" name="nama_pembina" value="{{ $eskul->nama_pembina }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kontak_pembina" class="form-label">Kontak Pembina</label>
                            <input type="text" class="form-control" id="kontak_pembina" name="kontak_pembina" value="{{ $eskul->kontak_pembina }}" placeholder="Nomor telepon Pembina">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $eskul->alamat }}" placeholder="Alamat Pembina">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Baru</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            @if ($eskul->foto)
                                <div class="mt-2">
                                    <small class="text-muted">Foto saat ini:</small><br>
                                    <img src="{{ asset('storage/' . $eskul->foto) }}" alt="{{ $eskul->nama_eskul }}" class="img-thumbnail mt-1" width="100">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $eskul->deskripsi }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.eskul.index') }}" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
