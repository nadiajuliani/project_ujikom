@extends('layouts.user')
@section('content')

<style>
    .eskul-hero {
        background: linear-gradient(135deg, #f0f4ff, #ffffff);
        border-radius: 2rem;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .eskul-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .eskul-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2c3e50;
    }
    .eskul-subtitle {
        color: #555;
        font-size: 1.1rem;
    }
    .jadwal-list li {
        background-color: #f7f9fc;
        border: none;
        border-left: 5px solid #4b7bec;
    }
</style>

<div class="container py-5">
    <div class="eskul-hero row g-0">
        <div class="col-lg-6">
            <img src="{{ asset('storage/' . $eskul->foto) }}" class="eskul-img" alt="Foto Eskul">
        </div>
        <div class="col-lg-6 p-5">
            <h2 class="eskul-title">{{ $eskul->nama_eskul }}</h2>
            <p class="eskul-subtitle"><strong>Pembina:</strong> {{ $eskul->nama_pembina }}</p>
            <p class="eskul-subtitle"><strong>Kontak Pembina:</strong> {{ $eskul->kontak_pembina }}</p>
            <p class="eskul-subtitle"><strong>Alamat:</strong> {{ $eskul->alamat }}</p>
            <p class="mt-4"><strong>Deskripsi:</strong><br>{{ $eskul->deskripsi }}</p>

            @if($eskul->jadwal && $eskul->jadwal->count())
                <h5 class="mt-5 mb-3 fw-semibold text-primary">Jadwal Latihan</h5>
                <ul class="list-group jadwal-list">
                    @foreach($eskul->jadwal as $jadwal)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>{{ $jadwal->hari }}</strong>
                            <span class="text-muted">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted mt-3">Belum ada jadwal tersedia.</p>
            @endif

            <a href="{{ url('/') }}" class="btn btn-outline-warning mt-5">← Kembali ke Beranda</a>
        </div>
    </div>
</div>

@endsection
