@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">

        <div class="card-header bg-primary text-white">
            <h6>Menunggu Persetujuan</h6>
        </div>

        <div class="card-body">

            <!-- FORM BULK DELETE -->
            <form action="{{ route('admin.penerimaan.bulkDelete') }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger mb-3"
                    onclick="return confirm('Yakin hapus data?')">
                    Bulk Delete
                </button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>Nama</th>
                            <th>Eskul</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($menunggu as $item)
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" value="{{ $item->id }}">
                            </td>

                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->eskul->nama_eskul }}</td>
                            <td>{{ $item->tahun_ajaran }}</td>

                            <td class="d-flex gap-2">

                                <!-- SETUJU -->
                                <form action="{{ route('admin.penerimaan.approveMenunggu') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="daftar_id" value="{{ $item->id }}">
                                    <button class="btn btn-success btn-sm">Setujui</button>
                                </form>

                                <!-- TOLAK -->
                                <form action="{{ route('admin.penerimaan.rejectMenunggu') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="daftar_id" value="{{ $item->id }}">
                                    <button class="btn btn-warning btn-sm">Tolak</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>

            <!-- ======================== -->
            <!-- TABEL DISETUJUI -->
            <!-- ======================== -->
            <h5 class="mt-4">Disetujui</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Eskul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($disetujui as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->daftarEskul->user->name }}</td>
                        <td>{{ $item->daftarEskul->kelas }}</td>
                        <td>{{ $item->daftarEskul->eskul->nama_eskul }}</td>

                        <td class="d-flex gap-2">

                            <!-- DELETE -->
                            <form action="{{ route('admin.penerimaan.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
                                    Delete
                                </button>
                            </form>

                            <!-- WA -->
                            <a href="https://wa.me/{{ $item->daftarEskul->user->no_telp ?? '' }}?text={{ urlencode('Halo ' . $item->daftarEskul->user->name . ', pendaftaran kamu di ' . $item->daftarEskul->eskul->nama_eskul . ' telah disetujui.') }}"
                                target="_blank"
                                class="btn btn-success btn-sm">
                                WA
                            </a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- ======================== -->
            <!-- TABEL DITOLAK -->
            <!-- ======================== -->
            <h5 class="mt-4">Ditolak</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Eskul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ditolak as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->daftarEskul->user->name }}</td>
                        <td>{{ $item->daftarEskul->kelas }}</td>
                        <td>{{ $item->daftarEskul->eskul->nama_eskul }}</td>

                        <td class="d-flex gap-2">

                            <!-- DELETE -->
                            <form action="{{ route('admin.penerimaan.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
                                    Delete
                                </button>
                            </form>

                            <!-- WA -->
                            <a href="https://wa.me/{{ $item->daftarEskul->user->no_telp ?? '' }}?text=Maaf, pendaftaran kamu ditolak."
                                target="_blank"
                                class="btn btn-warning btn-sm">
                                WA
                            </a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- CHECK ALL -->
<script>
document.getElementById('checkAll').onclick = function() {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
};
</script>

@endsection