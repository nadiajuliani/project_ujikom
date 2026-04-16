@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">

        <div class="card-header bg-primary text-white">
            <h6>Menunggu Persetujuan</h6>
        </div>

        <div class="card-body">

            <!-- BULK DELETE FORM -->
            <form id="bulkDeleteForm" action="{{ route('admin.penerimaan.bulkDelete') }}" method="POST">
                @csrf
                @method('POST')

                <button type="submit" 
                        class="btn btn-danger mb-3"
                        onclick="return confirm('Yakin ingin menghapus data yang dipilih?')">
                    Hapus yg dipilih
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
                            <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->eskul->nama_eskul ?? '-' }}</td>
                            <td>{{ $item->tahun_ajaran ?? '-' }}</td>

                            <td class="d-flex gap-2">
                                <!-- SETUJU -->
                                <button type="button" 
                                        class="btn btn-success btn-sm"
                                        onclick="approveItem({{ $item->id }})">
                                    Setujui
                                </button>

                                <!-- TOLAK -->
                                <button type="button" 
                                        class="btn btn-warning btn-sm"
                                        onclick="rejectItem({{ $item->id }})">
                                    Tolak
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data menunggu persetujuan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>

            <!-- TABEL DISETUJUI & DITOLAK (sama seperti sebelumnya) -->
            <h5 class="mt-5">Disetujui</h5>
            <table class="table table-bordered">
                <!-- ... isi tabel disetujui tetap sama ... -->
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
                        <td>{{ $item->daftarEskul->user->name ?? '-' }}</td>
                        <td>{{ $item->daftarEskul->kelas ?? '-' }}</td>
                        <td>{{ $item->daftarEskul->eskul->nama_eskul ?? '-' }}</td>
                        <td class="d-flex gap-2">
                            <form action="{{ route('admin.penerimaan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                            <a href="https://wa.me/{{ $item->daftarEskul->user->no_telp ?? '' }}?text={{ urlencode('Halo ' . ($item->daftarEskul->user->name ?? '') . ', pendaftaran kamu di ' . ($item->daftarEskul->eskul->nama_eskul ?? '') . ' telah disetujui.') }}" 
                               target="_blank" class="btn btn-success btn-sm">WA</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data disetujui</td></tr>
                    @endforelse
                </tbody>
            </table>

            <h5 class="mt-4">Ditolak</h5>
            <table class="table table-bordered">
                <!-- ... isi tabel ditolak tetap sama ... -->
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
                        <td>{{ $item->daftarEskul->user->name ?? '-' }}</td>
                        <td>{{ $item->daftarEskul->kelas ?? '-' }}</td>
                        <td>{{ $item->daftarEskul->eskul->nama_eskul ?? '-' }}</td>
                        <td class="d-flex gap-2">
                            <form action="{{ route('admin.penerimaan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                            <a href="https://wa.me/{{ $item->daftarEskul->user->no_telp ?? '' }}?text=Maaf, pendaftaran kamu ditolak." 
                               target="_blank" class="btn btn-warning btn-sm">WA</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data ditolak</td></tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Script -->
<script>
    function approveItem(id) {
        if (!confirm('Yakin menyetujui data ini?')) return;

        let form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('admin.penerimaan.approveMenunggu') }}";

        let csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = '{{ csrf_token() }}';
        form.appendChild(csrf);

        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'daftar_id';
        input.value = id;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
    }

    function rejectItem(id) {
        if (!confirm('Yakin menolak data ini?')) return;

        let form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('admin.penerimaan.rejectMenunggu') }}";

        let csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = '{{ csrf_token() }}';
        form.appendChild(csrf);

        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'daftar_id';
        input.value = id;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
    }

    // Check All
    document.getElementById('checkAll').addEventListener('click', function() {
        document.querySelectorAll('input[name="ids[]"]').forEach(cb => {
            cb.checked = this.checked;
        });
    });
</script>

@endsection