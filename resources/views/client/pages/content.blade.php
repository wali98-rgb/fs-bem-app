<!-- Content Start -->
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">Konten</h6>
    <h1 class="mb-5">Kegiatan BEM IM</h1>
</div>
<div class="row g-4">
    @foreach ($contents as $content)
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="{{ asset($content->content) }}" alt="{{ $content->description }}">
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                        <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">{{ $content->description }}</h5>
                    <small>{{ $content->date }}</small>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Content End -->
