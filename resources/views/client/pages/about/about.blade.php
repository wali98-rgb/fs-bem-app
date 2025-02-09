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

@include('client.components.navbar')

<div class="container-fluid p-0 mb-5">
  <div class="owl-carousel-item position-relative" style="height: auto; overflow: hidden;">
      <img class="img-fluid w-100 h-50" 
           src="{{ asset('plugins/frontend/img/about.jpg') }}" 
           alt="" 
           style="object-fit: cover;">
      <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
           style="background: rgba(24, 29, 56, .7); padding: 50px 0;">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-10 text-center">
                      <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
      <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
              <div class="position-relative h-100">
                  <img class="img-fluid position-absolute w-100 h-100" 
                       src="{{ asset('plugins/frontend/img/logobem1.png') }}" 
                       alt="" 
                       style="object-fit: contain; ">
              </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
              <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
              <h1 class="mb-4">Sangha Parivartana</h1>
              <p class="mb-4">Menggambarkan sebuah kelompok atau komunitas yang berfokus pada perubahan, transformasi, atau perbaikan menuju arah yang lebih baik. Nama ini sangat cocok untuk menggambarkan organisasi atau kelompok yang bertujuan untuk menghadirkan perubahan positif melalui kolaborasi dan kebersamaan.</p>
            
              <div class="row gy-2 gx-4 mb-4">
                  <div class="col-sm-6">
                      <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Visi</p>
                      <p class="mb-4">Menjadikan BEM sebagai pusat pemberdayaan bagi mahasiswa, dengan memperkuat dan mengembangkan UKM akademis dan profesional yang relevan, inovatif, dan mendukung tumbuhnya potensi individu serta kolektif, sehingga tercipta lingkungan yang mendorong kreativitas, motivasi, dan pengembangan diri tanpa batas.</p>
                  </div>
                  <div class="col-sm-6">
                      <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Misi</p>
                      <ul>
                          <li>Mendukung pengembangan UKM yang relevan dan inovatif.</li>
                          <li>Mendorong potensi mahasiswa melalui program kreatif dan inspiratif.</li>
                          <li>Menciptakan lingkungan yang mendukung pengembangan diri.</li>
                          <li>Membekali mahasiswa dengan keterampilan akademis dan profesional.</li>
                          <li>Memperkuat kolaborasi internal dan eksternal untuk pemberdayaan mahasiswa.</li>
                          <li>Meningkatkan partisipasi mahasiswa dalam kegiatan olahraga.</li>
                          <li>Menampung aspirasi seluruh mahasiswa dan menjembataninya.</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- About End -->


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



