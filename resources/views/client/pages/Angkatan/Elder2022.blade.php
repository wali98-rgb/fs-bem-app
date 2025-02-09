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
                        <h1 class="display-3 text-white animated slideInDown">Angkatan 2022</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


  
<!--  Start -->





  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Angkatan 22</h6>
            <h1 class="mb-5">ketua dan Wakil Ketua</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('plugins/frontend/img/yos.jpg') }}" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Yosama</h3>
                        
                        <h5 class="mb-4">Manajemen 22</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('plugins/frontend/img/yos.jpg') }}" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Yosama</h3>
                        <h5 class="mb-4">Manajemen 22</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container-xxl py-5">
  <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
          <h6 class="section-title bg-white text-center text-primary px-3">Daftar User</h6>
          <h1 class="mb-5">Anggota</h1>
      </div>
      <div class="row g-4 justify-content-center">
          @foreach ($users as $key => $user)
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 * ($key + 1) }}s">
                  <div class="course-item bg-light">
                      <div class="position-relative overflow-hidden">
                        @if ($user->photo === null)
                        <img src="{{ asset('images/profile_img/default-image.jpg') }}" alt="Default Profile"
                            style="width: 50px; height: 50px; object-fit: cover;" class="img-fluid img-circle">
                    @else
                        <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}"
                            style="width: 50px; height: 50px; object-fit: cover;" class="img-fluid img-circle">
                    @endif
                    
                          <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                              <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                              <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                          </div>
                      </div>
                      <div class="text-center p-4 pb-0">
                          <h3 class="mb-0">{{ $user->name }}</h3>
                          <h5 class="mb-4">{{ $user->email }}</h5>
                      </div>
                      <div class="d-flex border-top">
                          <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{ $user->role ?? 'User' }}</small>
                          <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>Aktif</small>
                          <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>ID: {{ $user->id }}</small>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</div>











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