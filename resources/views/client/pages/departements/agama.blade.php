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


@include('client.components.navbar')

<body>
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
                        <h1 class="display-3 text-white animated slideInDown">Departemen Agama</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


  
<!--  Start -->
<div class="container-xxl py-5">
  <div class="container">
      <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
              <div class="position-relative h-100">
                  <img class="img-fluid position-absolute w-100 h-100" 
                       src="{{ asset('plugins/frontend/img/agama.png') }}" 
                       alt="" 
                       style="object-fit: contain; ">
              </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
              <h6 class="section-title bg-white text-start text-primary pe-3">Departemen Agama</h6>
              <h1 class="mb-4">Tugas Pokok dan Fungsi</h1>
              <p class="mb-4 " style="text-align: justify;">Bertanggung jawab untuk merancang dan melaksanakan program kegiatan keagamaan serta pembinaan akhlak, yang mencakup pengorganisasian acara keagamaan dan kegiatan yang memperkuat nilai-nilai moral serta karakter positif bagi anggota.
              <div class="row gy-2 gx-4 mb-4" >
                
                      <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Program Kerja</p>
                      <ul>
                          <li>Color Full of Ramadhan</li>
                          <li>Karim</li>
                          <li>Konten Keagamaan</li>
                        </ul>
                
              </div>
          </div>
      </div>
  </div>
</div>
<!--  End -->


{{-- Mentri Kabinet --}}
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container">
      <div class="text-center">
          <h6 class="section-title bg-white text-center text-primary px-3">Departemen Komdigi</h6>
          <h1 class="mb-5">Anggota Departemen</h1>
      </div>
      <div class="owl-carousel testimonial-carousel position-relative">
         
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