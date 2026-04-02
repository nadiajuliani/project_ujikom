@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h2 class="mb-1 fw-bold">Dashboard Admin</h2>

    <!-- WELCOME CARD -->
    <div class="card shadow-sm border-0 mt-5">
        <div class="card-body">
            <h4>👋 Selamat Datang, Admin</h4>
            <p class="text-muted mb-0">
                Gunakan dashboard ini untuk mengelola data siswa, ekstrakurikuler,
                dan persetujuan pendaftaran dengan mudah.
            </p>
        </div>
    </div>
    <br>

    <!-- CARD STATISTIK -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card dashboard-card bg-primary text-white">
                <div class="card-body">
                    <h6>Total Pendaftar</h6>
                    <h2>{{ $totalSiswa }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card bg-success text-white">
                <div class="card-body">
                    <h6>Disetujui</h6>
                    <h2>{{ $disetujui }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card bg-danger text-white">
                <div class="card-body">
                    <h6>Ditolak</h6>
                    <h2>{{ $ditolak }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card bg-warning text-white">
                <div class="card-body">
                    <h6>Menunggu</h6>
                    <h2>{{ $menunggu }}</h2>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
