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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.8.1/dist/cdn.min.js" defer></script>
</head>
<body>

<div class="wrapper">
    <div class="hero-image darkened-overlay text-center py-5" data-parallax="scroll"
         data-image-src="{{ asset('images/hero-2.jpg') }}">
        <img src="{{ asset('images/logo-initials.png') }}" alt="" class="img-fluid" width="200" style="z-index: 1"
             data-aos="fade-down">
        <div class="text-white font-cursive">
            <h1 class="display-1" data-aos="zoom-out-up" data-aos-duration="1000">
                Kevin & Fernanda
            </h1>
            <h3 data-aos="zoom-out-down" data-aos-offset="-100" data-aos-delay="100">
                The Wedding
            </h3>
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
                                 style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
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
                    <div class="card rounded-4 text-center" data-aos="fade-left">
                        <div class="card-body py-5">
                            <img src="https://placekitten.com/300" alt="" class="img-fluid rounded-circle mb-3 mx-auto"
                                 style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
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
    <div id="save_the_date" class="position-relative pb-5" style="padding-top: 150px;">
        <div class="position-absolute w-100 darkened-overlay"
             style="top: 0;left: 0; height: 80%; background-repeat: no-repeat; background-size: cover; background-position: center bottom"
             data-lazy data-background-image="{{ asset('images/banner-save-the-date.jpg') }}"></div>
        <div class="container position-relative text-center" style="z-index: 1">
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
                            @include('components.horizontal-separator')
                            <strong class="mt-3 d-block">
                                11:00
                            </strong>
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
                            @include('components.horizontal-separator')
                            <strong class="mt-3 d-block">
                                18:00
                            </strong>
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
    <div id="gallery" class="py-5">
        <div class="container">
            <img src="{{ asset('images/hero-2.jpg') }}" alt="" class="img-fluid w-100 mb-4">
            <img src="{{ asset('images/hero-2.jpg') }}" alt="" class="img-fluid w-100">
        </div>
    </div>
    <div id="protocol" style="background-color:var(--color-primary);" class="rounded-4">
        <div class="container text-white py-5">
            <p class="text-center mx-auto" style="max-width: 350px">
                Love is caring.<br>
                Your health and safety is very important to us.<br>
                To keep everyone comfortable and safe,
                please follow health protocols.
            </p>
            <div class="row mt-5">
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/protocol-wear-mask.png') }}" alt="" class="img-fluid figure-img">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Wear Mask
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/protocol-wear-mask.png') }}" alt="" class="img-fluid figure-img">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Wash Hands
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/protocol-wear-mask.png') }}" alt="" class="img-fluid figure-img">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Clean Surfaces
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/protocol-wear-mask.png') }}" alt="" class="img-fluid figure-img">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Keep Distance
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div id="gift" style="height: 100vh;" class="d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <h1 class="text-uppercase">
                Wedding Gift
            </h1>
            @include('components.horizontal-separator')
            <button class="btn btn-secondary text-uppercase mt-4" data-bs-toggle="modal">
                Send Gift
            </button>
        </div>
    </div>
    <div id="cta"
         style="background-repeat: no-repeat; background-size: cover; background-position: center bottom; padding-top: 10%; padding-bottom: 10%"
         data-parallax="scroll" data-image-src="{{ asset('images/banner-cta.jpg') }}">
        <div class="container text-white py-5 my-5 text-center">
            <h3 class="display-3 text-uppercase">
                We Can't Wait To See You!
            </h3>
            <em>
                Please let us know if you'll be able to make it.
            </em>
        </div>
    </div>
    <div id="rsvp" class="my-5 py-5">
        <div class="container my-5 py-5">
            <div class="text-center">
                <h1>
                    RSVP
                </h1>
                @include('components.horizontal-separator')
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="" class="mt-4"
                          x-data="{
                            attend: ''
                          }">
                        <div class="mb-3">
                            <label class="fw-bold">
                                Your Name
                            </label>
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                   value="Nama Tamu Undangan"
                                   aria-label="your name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">
                                        Hadir Resepsi
                                    </label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio1"
                                                   value="yes" x-model="attend">
                                            <label class="form-check-label" for="inlineRadio1">Hadir</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2"
                                                   value="no" x-model="attend">
                                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div x-show="attend === 'yes'" x-transition>
                                        <label class="fw-bold">
                                            Jumlah Yang Hadir
                                        </label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected value="" disabled hidden>Jumlah Yang Hadir</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary">
                                Confirm
                            </button>
                        </div>
                    </form>
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
