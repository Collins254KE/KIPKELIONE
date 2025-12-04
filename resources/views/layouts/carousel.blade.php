<div class="hero-content-overlay">
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">

        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#heroCarousel" data-slide-to="1"></li>
            <li data-target="#heroCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Carousel items -->
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('images/Slider2.jpg') }}" class="d-block w-100" alt="NG-CDF Bursary">

                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    @guest
                        <h3 class="text-white"><b>NG-CDF Bursary Application Portal</b> <br>(NBAP)</h3>
                        <a class="btn btn-outline-success mt-3" href="{{ route('register') }}">Register</a>
                    @else
                        <h3 class="text-white"><b>NG-CDF Bursary Application Portal</b> <br>(NBAP)</h3>
                        <div class="mt-3">
                            <a class="btn btn-outline-success" href="{{ route('apply') }}">High School</a>
                            <a class="btn btn-outline-success" href="{{ route('scholarship.form') }}">Tertiary</a>

                            @if(Auth::user()->is_admin)
                                <a class="btn btn-outline-warning" href="{{ route('admin.cdf.index') }}">Admin</a>
                            @endif
                        </div>
                    @endguest
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('images/Slider1.jpg') }}" class="d-block w-100" alt="Education Slide">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-white">Supporting Education in Kipkelion East</h3>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('images/Slider4.jpg') }}" class="d-block w-100" alt="Scholarships Slide">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-white">Apply Today for Scholarships & Bursaries</h3>
                </div>
            </div>

        </div>

        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</div>
