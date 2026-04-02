@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                        <h6 class="text-white text-capitalize m-0">Tambah Ekstrakurikuler</h6>
                    </div>
                </div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('admin.eskul.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_eskul" class="form-label">Nama Ekstrakurikuler</label>
                            <input type="text" class="form-control" id="nama_eskul" name="nama_eskul" placeholder="Nama Ekskul" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_pembina" class="form-label">Nama Pembina</label>
                            <input type="text" class="form-control" id="nama_pembina" name="nama_pembina" placeholder="Nama Pembina" required>
                        </div>

                        <div class="mb-3">
                            <label for="kontak_pembina" class="form-label">Kontak Pembina</label>
                            <input type="text" class="form-control" id="kontak_pembina" name="kontak_pembina" placeholder="Nomor telepon Pembina">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pembina">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.eskul.index') }}" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
