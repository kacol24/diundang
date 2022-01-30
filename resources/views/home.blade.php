<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">

    <title>Hello, world!</title>

    <style>
        :root {
            --color-primary: #09232f;
            --color-secondary: #4d1c32;
        }

        .rounded-4 {
            border-radius: 1rem;
        }

        .hero-image {
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .darkened-overlay {
            position: relative;
        }

        .darkened-overlay::before {
            content: '';
            position: absolute;
            z-index: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
        }

        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-primary:hover {
            background-color: #0d3344;
            border-color: #0d3344;
        }

        .btn-secondary {
            background-color: var(--color-secondary);
            border-color: var(--color-secondary);
        }

        .btn-secondary:hover {
            background-color: #3a1526;
            border-color: #3a1526;
        }

        .link-color\:blue {
            color: var(--color-primary);
            transition: color 200ms;
        }

        .link-color\:blue:hover {
            color: #0d3344;
        }

        .text-color\:blue {
            color: var(--color-primary);
        }

        .text-color\:gold {
            color: #c8a945;
        }

        .font-cursive {
            font-family: cursive;
        }

        #bgm {
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 10;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/lozad@1.16.0/dist/lozad.min.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="hero-image darkened-overlay text-center py-5" data-parallax="scroll"
         data-image-src="{{ asset('images/hero-2.jpg') }}">
        <img src="{{ asset('images/logo-initials.png') }}" alt="" class="img-fluid" width="200" style="z-index: 1">
        <div class="text-white font-cursive">
            <h3 data-aos="zoom-out-down">
                The Wedding of
            </h3>
            <h1 class="display-1" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="1000">
                Kevin & Fernanda
            </h1>
        </div>
        <div data-aos="fade-up" data-aos-delay="300" class="text-white">
            Save The Date<br>
            -<br>
            24 . 09 . 2022
        </div>
    </div>
    <header class="sticky-top">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:var(--color-secondary);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    #loVINyouforeFER
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            #loVINyouforeFER
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#couple">Bride & Groom</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#event_date">Save The Date</a>
                            </li>
                            {{--                            <li class="nav-item dropdown">--}}
                            {{--                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"--}}
                            {{--                                   data-bs-toggle="dropdown" aria-expanded="false">--}}
                            {{--                                    Dropdown--}}
                            {{--                                </a>--}}
                            {{--                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">--}}
                            {{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
                            {{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <hr class="dropdown-divider">--}}
                            {{--                                    </li>--}}
                            {{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="py-5" id="couple" style="background-color:var(--color-primary);">
        <div class="container py-5">
            <div class="row py-5 align-items-center justify-content-around overflow-hidden">
                <div class="col-md-4">
                    <div class="card rounded-4 text-center" data-aos="fade-right">
                        <div class="card-body py-5">
                            <img src="https://placekitten.com/250" alt="" class="img-fluid rounded-circle mb-3 mx-auto"
                                 style="max-width: 150px" data-aos="flip-right" data-aos-delay="300">
                            <h2 class="font-cursive">
                                Kevin Chandra
                            </h2>
                            <p class="m-0">
                                <strong>Son of</strong><br>
                                Gunawan Chandra & Susilowati
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card rounded-4 text-center" data-aos="fade-left" data-aos-delay="300">
                        <div class="card-body py-5">
                            <img src="https://placekitten.com/300" alt="" class="img-fluid rounded-circle mb-3 mx-auto"
                                 style="max-width: 150px" data-aos="flip-left" data-aos-delay="300">
                            <h2 class="font-cursive">
                                Fernanda Eka Putri
                            </h2>
                            <p class="m-0">
                                <strong>Daughter of</strong><br>
                                Ge Cingkai & Lim Liauw Hung San
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="save_the_date" class="py-5 position-relative">
        <div class="position-absolute w-100 darkened-overlay" style="top: 0;left: 0;">
            <img src="{{ asset('images/banner-save-the-date.jpg') }}"
                 class="img-fluid" data-lazy>
        </div>
        <div class="container py-5 position-relative text-center" style="z-index: 1">
            <h3 class="text-uppercase text-white display-4">
                Saturday,<br>
                September 24th, 2022
            </h3>
            <a href="" class="btn btn-secondary" data-aos="fade-down">
                Save The Date
            </a>
            <div class="row mt-5 justify-content-around">
                <div class="col-md-5">
                    <div class="card rounded-4 text-center border-0" data-aos="fade-up">
                        <div class="card-body py-5">
                            <h3 class="card-title display-6">
                                Holy Matrimony
                            </h3>
                            <hr>
                            <strong>11:00</strong>
                            <div class="text-muted">
                                at
                            </div>
                            <address>
                                <strong>St. Aloysius Gonzaga Church</strong><br>
                                Jl. something bla di daerah bla
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card rounded-4 text-center border-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body py-5">
                            <h3 class="card-title display-6">
                                Wedding Reception
                            </h3>
                            <hr>
                            <strong>18:00</strong>
                            <div class="text-muted">
                                at
                            </div>
                            <address>
                                <strong>XO Palace</strong><br>
                                Jl. something bla di daerah bla
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
<script src="https://cdn.jsdelivr.net/npm/jquery-parallax.js@1.5.0/parallax.min.js"></script>
<audio src="{{ asset('uploads/bgm-cant-help-falling-in-love-elvis.mp3') }}" loop autoplay controls id="bgm"></audio>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
<script>
    AOS.init();

    var lazyParallax = window.lozad('.parallax-slider');
    lazyParallax.observe();

    const observer = window.lozad('[data-lazy]');
    observer.observe();
</script>
</body>
</html>
