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