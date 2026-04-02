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
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

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
    <div class="body-wrapper">
        <div class="container-fluid px-0 py-5">
            <div class="row mx-0 justify-content-center pt-5">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Team Start -->
    
    <!-- Team End -->


    <!-- Testimonial Start -->
    
    <!-- Testimonial Start -->


    <!-- Contact Start -->
     
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>SMKN 1</h1>
                    </a>
                    <p class="m-0">SMKN 1 adalah Sekolah Menengah Kejuruan yang berfokus pada pengembangan keahlian siswa di bidang teknologi, bisnis, dan industri kreatif. Dengan fasilitas lengkap dan tenaga pengajar profesional, SMKN 1 berkomitmen mencetak lulusan yang siap kerja, unggul dalam kompetensi, dan berdaya saing global.</p>
                </div>
                        
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Dago Atas No. 9, Kel. Dago, Kec. Coblong, Kota Bandung</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+62 123 456 789</p>
                    <p><i class="fa fa-envelope mr-2"></i>234567634@smkn1bandung.sch.id</p>
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
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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