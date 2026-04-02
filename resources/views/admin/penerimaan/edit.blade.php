@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Penerimaan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.penerimaan.update', $penerimaan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="daftar_id">Id Form</label>
                            <select id="daftar_id" name="daftar_id" class="form-control mb-3 mt-2" required>
                                <option value="">Pilih Formulir</option>
                                @foreach ($daftar_eskul as $item)
                                    <option value="{{ $item->id }}" {{ $penerimaan->daftar_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                                @if ($errors->has('daftar_id'))
                                    <span class="text-danger">{{ $errors->first('daftar_id') }}</span>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label for="persetujuan">Persetujuan</label>
                            <select id="persetujuan" name="persetujuan" class="form-control mb-3 mt-2" required>
                                <option value="">Pilih Persetujuan</option>
                                <option value="Disetujui" {{ $penerimaan->persetujuan == 'Disetujui' ? 'selected' : '' }}><br> Disetujui</option>
                                <option value="Ditolak" {{ $penerimaan->persetujuan == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <div>
                                <label for="alasan">Alasan Ditolak</label>
                                <input type="text" id="alasan" name="alasan" class="form-control mb-3 mt-2" placeholder="Masukkan Alasan Ditolak" value="{{ $penerimaan->alasan }}">
                            </div>
                        </div>
                        <div>
                            <label for="catatan">Catatan</label>
                            <textarea id="catatan" name="catatan" class="form-control mb-3" rows="3" placeholder="Masukkan Catatan">{{ $penerimaan->catatan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection