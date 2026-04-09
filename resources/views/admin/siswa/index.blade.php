@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-success">Data Siswa</h4>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <form action="{{ route('admin.siswa.bulkDelete') }}" method="POST">
        @csrf

        <div class="mb-3">
            <button type="submit"
                class="btn btn-danger"
                onclick="return confirm('Hapus siswa yang dipilih?')">
                🗑 Hapus Yang Dipilih
            </button>
            <button
                type="button"
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#importExcelModal"
            >
                Import Excel
            </button>
        </div>

        <!-- TABLE DATA SISWA -->
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>
                        <input type="checkbox" id="checkAll">
                    </th>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($siswa as $item)
                    <tr>
                        <td>
                            <input type="checkbox"
                                   name="ids[]"
                                   value="{{ $item->id }}"
                                   class="checkItem">
                        </td>

                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center">{{ $item->kelas }}</td>

                        <td class="text-center">
                            <span class="badge bg-success">
                                {{ strtoupper($item->is_admin ? 'Admin' : 'User') }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.siswa.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Data siswa belum ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </form>
</div>

<!-- CHECK ALL SCRIPT -->
<script>
document.getElementById('checkAll').addEventListener('click', function () {
    let checkboxes = document.querySelectorAll('.checkItem');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>


<!-- ================= MODAL IMPORT EXCEL ================= -->
<div class="modal fade" id="importExcelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('admin.siswa.import') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Import Akun Siswa</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">File Excel</label>
                        <input type="file"
                               name="file"
                               class="form-control"
                               required>
                    </div>

                    <small class="text-muted">
                        Belum punya template?
                        <a href="{{ route('admin.siswa.template') }}">
                            Download template Excel
                        </a>
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit"
                            class="btn btn-success">
                        Import
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
