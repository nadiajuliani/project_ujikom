@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Tambah Siswa</h3>

    <form action="{{ route('admin.siswa.store') }}" method="POST">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Nama">

    <input type="email" name="email" class="form-control mb-2" placeholder="Email">

    <input type="text" name="kelas" class="form-control mb-2" placeholder="Kelas">

    <input type="password" name="password" class="form-control mb-2" placeholder="Password">

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
</form>
</div>
@endsection