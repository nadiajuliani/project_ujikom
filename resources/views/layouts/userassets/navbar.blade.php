<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-lg-3 shadow-sm">
        <!-- Logo + Nama -->
        <a href="/" class="navbar-brand ml-lg-3 d-flex align-items-center">
            <img 
                src="{{ asset('assets/img/logbaru.jpg') }}" 
                alt="Logo SMART ESKUL" 
                class="img-fluid me-3"
                style="max-height: 80px; width: auto;">
            
            <div>
                <h1 class="m-0 text-primary fw-bold" style="font-size: 1.65rem; line-height: 1;">
                    SMART ESKUL
                </h1>
                <small class="text-muted" style="font-size: 0.85rem;">SMK ASSALAAM</small>
            </div>
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <div class="navbar-nav align-items-center">
                <a href="{{ route('home') }}" class="nav-item nav-link active me-4">Halaman Beranda</a>
                
                @auth
                <a href="{{ route('home') }}#jadwal" class="nav-item nav-link me-4">Jadwal Latihan</a>
                
                <!-- Tombol Daftar yang dibaguskan -->
                <a href="{{ route('home') }}#form" 
                   class="btn btn-primary py-2 px-4 rounded-pill">
                    Daftar Ekstrakurikuler
                </a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- Header dengan Background Foto Custom -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" 
     style="margin-bottom: 90px; 
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), 
                        url('{{ asset('assets/img/profil.png') }}') center/cover no-repeat;
            height: 520px;">
    
    <div class="container text-center my-5 py-5">
        <h1 class="text-white mt-4 mb-4" style="font-size: 2.2rem;">
            Ekstrakurikuler SMK Assalaam Bandung
        </h1>
        <h1 class="text-white display-1 mb-5 fw-bold">
            Daftar Ekstrakurikuler
        </h1>
        
        <!-- Kalau mau tambah tombol atau search, bisa di sini nanti -->
    </div>
</div>      
</div>

