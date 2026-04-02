<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>SMKN 1</h1>
                </a>
                <p class="m-0">SMKN 1 adalah Sekolah Menengah Kejuruan yang berfokus pada pengembangan keahlian siswa di bidang teknologi, bisnis, dan industri kreatif. Dengan fasilitas lengkap dan tenaga pengajar profesional, SMKN 1 berkomitmen mencetak lulusan yang siap kerja, unggul dalam kompetensi, dan berdaya saing global.</p>
            </div>
            <div class="col-md-4 mb-5 text-end">
                @guest
                  <div class="mb-3">
                    <a href="{{ route('register') }}"
                       class="btn btn-primary d-flex justify-content-center align-items-center rounded-pill"
                       style="height: 50px; width: 100%;">
                       Register
                    </a>                             
                </div>  
                @endguest
                @auth
                <div>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center rounded-pill"
                                style="height: 50px; width: 100%;">
                            Log Out
                        </button>
                    </form>                                                
                </div>
                @endauth
            </div>            
        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Dago Atas No. 9, Kel. Dago, Kec. Coblong, Kota Bandung</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+62 123 456 789</p>
                <p><i class="fa fa-envelope mr-2"></i>234567634@smkn1bandung.sch.id</p>
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
</div>
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0">Copyright &copy; <a class="text-white" href="#">SMKN 1</a>. All Rights Reserved.
                </p>
            </div>
            
        </div>
    </div>
</div>