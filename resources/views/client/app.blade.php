<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BEM | IM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href={{ asset('plugins/frontend/img/bem.png') }} rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{ asset('plugins/frontend/lib/animate/animate.min.css') }} rel="stylesheet">
    <link href={{ asset('plugins/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{ asset('plugins/frontend/css/components/bootstrap.min.css') }} rel="stylesheet">


    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('plugins/frontend/css/components/Cstyle.css') }}">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('client.components.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src={{ asset('plugins/frontend/img/DSCF3611.jpg') }} alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Kabinet</h5>
                            <h1 class="display-3 text-white animated slideInDown">Sangha Parivartana</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Organisasi Badan Eksekutif Mahasiswa yang berfokus pada
                                perubahan transformasi atau perbaikan menuju arah yang lebih baik. Bertujuan untuk
                                menghadirkan perubahan positif melalui kolaborasi dan kebersamaan.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                            src="{{ asset('plugins/frontend/img/yos.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Presiden & Wakil Presiden Mahasiswa Periode 2024/2025</h1>
                    <h6 class="mb-4 text-dark">Presiden Mahasiswa - Yosama Al afgani </h6>
                    <h6 class="mb-4 text-dark">Wakil Presiden Mahasiswa - Rahayu Husna Syifa</h6>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Visi</p>
                            <p class="mb-4 ">Menjadikan BEM sebagai pusat pemberdayaan bagi mahasiswa, dengan
                                memperkuat dan mengembangkan UKM akademis dan profesional yang relevan, inovatif, dan
                                mendukung tumbuhnya potensi individu serta kolektif, sehingga tercipta lingkungan yang
                                mendorong kreativitas, motivasi, dan pengembangan diri tanpa batas.</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Misi</p>
                            <p class="mb-4">
                            <p>- Mendukung pengembangan UKM yang relevan dan inovatif.</p>
                            <p>- Mendorong potensi mahasiswa melalui program kreatif dan inspiratif.</p>
                            <p>- Menciptakan lingkungan yang mendukung pengembangan diri.</p>
                            <p>- Membekali mahasiswa dengan keterampilan akademis dan profesional.</p>
                            <p>- Memperkuat kolaborasi internal dan eksternal untuk pemberdayaan mahasiswa.</p>
                            <p>- Meningkatkan partisipasi mahasiswa dalam kegiatan olahraga.</p>
                            <p>- Menampung aspirasi seluruh mahasiswa dan menjembataninya.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    {{-- Mentri Kabinet --}}
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Struktur Departemen</h6>
                <h1 class="mb-5">Mentri Departemen</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/4.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Sekretaris Kabinet</h5>
                    <p>Fadhilah Nur Fitri</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/5.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Bendahara Kabinet</h5>
                    <p>Wulandari Nur Aini</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/2.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Pendidikan</h5>
                    <p>Hidayah Nur Tsani</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/1.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Komdigi</h5>
                    <p>Andre Pratama Sanevil</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/3.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Agama</h5>
                    <p>Delia Vikadila</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/7.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Ekonomi Kreatif</h5>
                    <p>Shinta Permatasari</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/6.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Sosial Masyarakat</h5>
                    <p>Cheria Sevani</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src={{ asset('plugins/frontend/img/8.jpg') }}
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Departemen Pemikat Regis</h5>
                    <p>Helmi Nur Akbar</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Mentri --}}

    <!-- Proker Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Proker</h6>
                <h1 class="mb-5">Program Kerja</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt=""
                            style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                            style="margin:  1px;">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Proker End -->

    <!-- content Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @include('client.pages.content')
        </div>
    </div>
    <!-- content End -->

    <!-- Footer Start -->
    @include('client.components.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{ asset('plugins/frontend/lib/wow/wow.min.js') }}></script>
    <script src={{ asset('plugins/frontend/lib/easing/easing.min.js') }}></script>
    <script src={{ asset('plugins/frontend/lib/waypoints/waypoints.min.js') }}></script>
    <script src={{ asset('plugins/frontend/lib/owlcarousel/owl.carousel.min.js') }}></script>

    <!-- Template Javascript -->
    <script src={{ asset('plugins/frontend/js/main.js') }}></script>
</body>

</html>
