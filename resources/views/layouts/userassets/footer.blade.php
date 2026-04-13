<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5 full-height" style="margin-top: 90px;">    <div class="container mt-5 pt-5">
        <div class="row align-items-start">
            <div class="col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>SMK Assalaam Bandung</h1>
                </a>
                <p class="m-0">SMK Assalaam Bandung adalah Sekolah Menengah Kejuruan yang berfokus pada pengembangan keahlian siswa di bidang teknologi, bisnis, dan industri kreatif. Dengan fasilitas lengkap dan tenaga pengajar profesional, SMK Assalaam Bandung berkomitmen mencetak lulusan yang siap kerja, unggul dalam kompetensi, dan berdaya saing global.</p>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-5 ms-auto d-flex justify-content-end align-items-start">
                @auth
                <div class="mt-3 mt-md-0">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" 
                                class="btn btn-danger btn-lg px-5 py-3 rounded-pill shadow-sm d-flex align-items-center gap-2">
                            <i class="fa fa-sign-out-alt"></i>
                            Log Out
                        </button>
                    </form>                                                
                </div>
                @endauth
            </div>            
        </div>

        <!-- Bagian bawah tetap sama -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Jl . Situtarate - terusan cibaduyut, Kab . Bandung - Jawa Barat</p>
                <p><i class="fa fa-phone-alt mr-2"></i>022 5420-220</p>
                <p><i class="fa fa-envelope mr-2"></i>smkassalaambandung.sch.id</p>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Ekstrakurikuler kita</h3>
                <div class="d-flex flex-column justify-content-start">
                    @forelse ($eskul as $item)
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ $item->nama_eskul }}</a>
                    @empty
                        <p class="text-white-50">Ekstrakurikuler tidak ada</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ FIX CUMA DI SINI -->
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important; padding-bottom: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-0">
                <p class="m-0">Copyright &copy; 
                    <a class="text-white" href="#">SMK Asslaam Bandung</a>. 
                    All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</div>