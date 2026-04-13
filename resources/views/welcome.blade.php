<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ekstrakurikuler SMK Assalaam Bandung</title>
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
                <small><i class="fa fa-phone-alt mr-2"></i>0225420 - 220
</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>smkassalaambandung.sch.id</small>
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
        <section id="jadwal" class="py-5 bg-light">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h6 class="text-primary text-uppercase mb-2">Jadwal Latihan</h6>
            <h1 class="display-5 text-dark">Jadwal Latihan Ekstrakurikuler</h1>
            <p class="text-muted">SMK Assalaam Bandung</p>
        </div>

        <!-- Grid Jadwal -->
        <div class="row">

            @forelse ($jadwal as $item)
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card h-100 border-0 shadow rounded">

                        <div class="card-body">

                            <!-- Nama Eskul -->
                            <h5 class="font-weight-bold text-dark mb-3">
                                {{ $item->eskul->nama_eskul }}
                            </h5>

                            <hr>

                            <!-- Hari -->
                            <p class="mb-2">
                                <span class="badge badge-primary px-3 py-2">
                                    {{ $item->hari }}
                                </span>
                            </p>

                            <hr>

                            <!-- Waktu -->
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Waktu</small>
                                <small class="text-primary font-weight-bold">
                                    {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                                </small>
                            </div>

                            <!-- Durasi -->
                            <div class="d-flex justify-content-between mt-2 pt-2 border-top">
                                <small class="text-muted">Durasi</small>
                                <small class="font-weight-bold text-dark">
                                    @php
                                        $start = \Carbon\Carbon::parse($item->jam_mulai);
                                        $end = \Carbon\Carbon::parse($item->jam_selesai);
                                        echo $start->diffInMinutes($end) . ' menit';
                                    @endphp
                                </small>
                            </div>

                        </div>

                    </div>

                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada jadwal latihan yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

        <!-- Di bagian form daftar -->
        <section id="form" class="py-5 bg-white">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h6 class="text-primary text-uppercase mb-2">Formulir</h6>
            <h1 class="display-5 text-dark">Form Pendaftaran Ekstrakurikuler</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">

                <!-- CARD FORM -->
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body p-5">

                        <form action="{{ route('daftar.eskul.store') }}" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control rounded-pill"
                                    value="{{ auth()->user()->name }}" readonly>
                            </div>

                            <!-- Eskul -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Pilih Ekstrakurikuler</label>
                                <select name="eskul_id" class="form-control rounded-pill" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($eskul as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_eskul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kelas -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Kelas</label>
                                <input type="text" name="kelas"
                                    class="form-control rounded-pill"
                                    placeholder="Contoh: XI RPL 1" required>
                            </div>

                            <!-- Tahun Ajaran -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Tahun Ajaran</label>
                                <select name="tahun_ajaran" class="form-control rounded-pill" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($tahunAjaran as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- No Telp -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">No. Telepon</label>
                                <input type="text" name="no_telp"
                                    class="form-control rounded-pill"
                                    placeholder="Opsional">
                            </div>

                            <!-- Alasan -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Alasan Mengikuti</label>
                                <textarea name="alasan"
                                    class="form-control rounded"
                                    rows="3"
                                    placeholder="Opsional"></textarea>
                            </div>

                            <!-- Button -->
                            <div class="text-center mt-4">
                                <button type="submit"
                                    class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                                    Daftar Sekarang
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- END CARD -->

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
