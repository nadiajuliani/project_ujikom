@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Edit Data Siswa</h4>

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $siswa->name }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ $siswa->email }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text"
                   name="kelas"
                   class="form-control"
                   value="{{ $siswa->kelas }}"
                   required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
