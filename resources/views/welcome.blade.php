<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ekstrakurikuler Web SMKN 1</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
<div class="container-fluid bg-dark">
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small><i class="fa fa-phone-alt mr-2"></i>+62 123 456 789</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>234567634smkn1bandung.sch.id</small>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
        </div>
    </div>
</div>
<!-- Topbar End -->


    <!-- Navbar Start -->
    @include('layouts.userassets.navbar')
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Ekstrakurikuler SMKN 1</h1>
            <h1 class="text-white display-1 mb-5">Daftar Ekstrakurikuler</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->

    <!-- About End -->


    <!-- Feature Start -->

    <!-- Feature Start -->


    <!-- Courses Start -->
    <div class="container-fluid px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Ekstrakurikuler</h6>
                    <h1 class="display-4">Macam-macam Ekstrakurikuler Kami</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            @forelse($eskul as $item)
                <div class="courses-item position-relative">
                    <img class="img-fluid" src="{{ asset('storage/' . $item->foto) }}" alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{ $item->nama_eskul }}</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{ $item->nama_pembina }}</span>
                                <span class="text-white"><i
                                        class="fa fa-phone mr-2"></i>{{ $item->kontak_pembina }}</span>
                            </div>
                        </div>
                        <div class="w-100 bg-white text-center p-4">
                            <a href="{{ route('eskul.detail', $item->id) }}" class="btn btn-info rounded-pill">
                             Course Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No courses available</p>
            @endforelse
        </div>
        @guest
            <div class="row justify-content-center bg-image mx-0 mb-5">
                <div class="col-lg-6 py-5">
                    <div class="bg-white p-5 my-5">
                        <h1 class="text-center mb-4">Login</h1>
                        <form>
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <a href="{{ route('login') }}"
                                        class="btn btn-primary d-flex justify-content-center align-items-center rounded-pill"
                                        style="height: 60px;">
                                        Log in
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <!-- Di bagian jadwal -->
        <section id="jadwal">
            <div class="container-fluid px-0 py-5">
                <div class="row mx-0 justify-content-center pt-5">
                    <div class="col-lg-6">
                        <div class="section-title text-center position-relative mb-4">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Jadwal Latihan
                            </h6>
                            <h1 class="display-4">Jadwal Latihan Ekstrakurikuler</h1>
                        </div>
                    </div>
                </div>
                <!-- Tampilkan daftar jadwal -->
                <div class="row">
                    @foreach ($jadwal as $item)
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->eskul->nama_eskul }}</h5>
                                    <p class="card-text">Hari: {{ $item->hari }}</p>
                                    <p class="card-text">Jam: {{ $item->jam_mulai }} - {{ $item->jam_selesai }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Di bagian form daftar -->
        <<section id="form" class="py-5 bg-light">
            <div class="container">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Formulir</h6>
                    <h1 class="display-4">Form Pendaftaran Ekstrakurikuler</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('daftar.eskul.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="eskul_id">Nama</label>
                                <input type="disabled" name="nama" id="nama" class="form-control rounded-pill"
                                    value="{{ auth()->user()->name }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="eskul_id">Pilih Ekstrakurikuler</label>
                                <select name="eskul_id" id="eskul_id" class="form-control rounded-pill" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($eskul as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_eskul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control rounded-pill"
                                    placeholder="Contoh: XI RPL 1" required>
                            </div>

                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <select name="tahun_ajaran" id="tahun_ajaran" class="form-control rounded-pill" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($tahunAjaran as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control rounded-pill"
                                    placeholder="Opsional">
                            </div>

                            <div class="form-group">
                                <label for="alasan">Alasan Mengikuti Ekstrakurikuler</label>
                                <textarea name="alasan" id="alasan" class="form-control" rows="3" placeholder="Opsional"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-2">Daftar
                                    Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </section>
        @endauth
        <!-- Footer Start -->
        @include('layouts.userassets.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
                class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('user/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
