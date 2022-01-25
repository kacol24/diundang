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

    <title>Hello, world!</title>

    <style>
        .hero-image {
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .hero-image::before {
            content: '';
            position: absolute;
            z-index: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
        }

        .text-color\:blue {
            color: #545b8c;
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
</head>
<body>

<div class="wrapper">
    <div class="hero-image py-5" data-parallax="scroll" data-image-src="{{ asset('images/hero-1.jpeg') }}">
        <img src="{{ asset('images/logo-initials.png') }}" alt="" class="img-fluid" width="200" style="z-index: 1">
        <a href="" class="text-color:blue text-decoration-none" style="z-index: 1">
            <i class="fas fa-fw fa-chevron-circle-down fa-2x"></i>
        </a>
        <div class="position-absolute text-center d-flex align-items-center justify-content-center" style="top: 0;left: 0;width: 100%;height: 100%;">
            <div class="text-white font-cursive">
                <h3>
                    The Wedding of
                </h3>
                <h1 class="display-1">
                    Kevin & Fernanda
                </h1>
                Save The Date<br>
                -<br>
                24 . 09 . 2022
            </div>
        </div>
    </div>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">#loVINyouforeFER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#couple">
                                Bride & Groom
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Save The Date
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container py-5" id="couple" style="background-color:rgba(162,195,255,0.3);">
        <div class="row align-items-center">
            <div class="col-md">
                <div class="text-center">
                    <img src="https://placekitten.com/250" alt="" class="img-fluid rounded-circle mb-3"
                         style="max-width: 250px">
                    <h2 class="font-cursive">
                        Kevin Chandra
                    </h2>
                    <p>
                        <strong>Son of</strong><br>
                        Gunawan Chandra &<br>
                        Susilowati
                    </p>
                </div>
            </div>
            <div class="col-md-1 display-1 text-center" style="font-family: cursive;">
                &
            </div>
            <div class="col-md">
                <div class="text-center">
                    <img src="https://placekitten.com/300" alt="" class="img-fluid rounded-circle mb-3"
                         style="max-width: 250px">
                    <h2 class="font-cursive">
                        Fernanda Eka Putri
                    </h2>
                    <p>
                        <strong>Daughter of</strong><br>
                        Ge Cingkai &<br>
                        Lim Liauw Hung San
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5" id="event_date" style="background-color:rgba(229,190,190,0.3);">
        <div class="container">
            <h2 class="font-cursive display-3 text-center">
                Save The Date
            </h2>
            <div class="row align-items-center">
                <div class="col-md-5 text-center">
                    <div class="px-5">
                        <h3 class="font-cursive">
                            Holy Matrimony
                        </h3>
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
                <div class="col-md">
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15830.915984586807!2d112.65947088471673!3d-7.27164828084286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fea1a306000b%3A0x6d92118a59928e4d!2sCatholic%20Church%20of%20St%20Aloysius%20Gonzaga!5e0!3m2!1sen!2sid!4v1643106758467!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="row mt-5 align-items-center">
                <div class="col-md-5 text-center order-md-3">
                    <div class="px-5">
                        <h3 class="font-cursive">
                            Wedding Reception
                        </h3>
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
                <div class="col-md order-md-1">
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.640324380142!2d112.70500521525437!3d-7.281701673585097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc0ee483ffff%3A0x625015abf9f3022e!2sXO%20Palace!5e0!3m2!1sen!2sid!4v1643106845396!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
</script>
</body>
</html>
