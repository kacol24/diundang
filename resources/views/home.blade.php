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
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <title>The Wedding of Kevin & Fernanda</title>
    <meta name="description"
          content="Dear {{ $guestName }}, you are cordially invited to celebrate the wedding of Kevin and Fernanda on September 24th, 2022.">
    <meta property="og:image" content="{{ asset('images/logo-initials.png') }}"/>
    <meta property="og:image:width" content="194"/>
    <meta property="og:image:height" content="143"/>

    <script src="https://cdn.jsdelivr.net/npm/lozad@1.16.0/dist/lozad.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.8.1/dist/cdn.min.js" defer></script>
</head>
<body class="modal-open">

<div class="wrapper">
    <div class="hero-image darkened-overlay text-center py-5 overflow-hidden"
         data-parallax
         data-exclude-agents="false"
         data-src="{{ asset('images/hero-2.jpg') }}">
        <div class="font-serif text-white display-1" style="z-index: 2; letter-spacing: -6px;" data-aos="fade-down">
            KF
        </div>
        <div class="text-white font-serif" style="z-index: 2">
            <h1 class="display-3 text-uppercase" data-aos="zoom-out-up" data-aos-duration="1000">
                Kevin & Fernanda
            </h1>
            <h3 data-aos="zoom-out-down" data-aos-offset="-100" data-aos-delay="100">
                The Wedding
            </h3>
        </div>
    </div>
    <header class="sticky-top font-sans-serif">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:var(--color-secondary);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    #loVINyouforeFER
                </a>
                <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="fas fa-fw fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                     style="background-color:var(--color-secondary)"
                     aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">
                            #loVINyouforeFER
                        </h5>
                        <button type="button" class="btn-close text-white" style="background: none;opacity: 1;"
                                data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-fw fa-times fa-lg"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link text-white" aria-current="page" href="#couple">Bride & Groom</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#event_date">Save The Date</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#protocol">Health Protocol</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#rsvp">RSVP</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="position-relative overflow-hidden darkened-overlay" id="couple"
         style="background-color:var(--color-primary);padding-top: 10%;padding-bottom: 10%;">
        <div class="simple-parallax--faster decoration-1">
            <img src="{{ asset('images/decoration-1.png') }}" alt="" class="img-fluid">
        </div>
        <div class="simple-parallax decoration-2">
            <img src="{{ asset('images/decoration-2.png') }}" alt="" class="img-fluid">
        </div>
        <div class="container py-5 position-relative" style="z-index: 2">
            <div class="text-center text-white">
                <h1 class="text-uppercase display-3 font-serif">
                    We Are Getting Married
                </h1>
                <p style="max-width: 500px" class="mx-auto">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan
                    memberikan doa restu kepada kedua mempelai
                </p>
            </div>
            <div class="row py-5 align-items-center justify-content-around overflow-hidden">
                <div class="col-md-4">
                    <div class="card rounded-4 mb-4 text-center" data-aos="fade-right">
                        <div class="card-body py-5">
                            <img src="https://placekitten.com/250" alt="" class="img-fluid rounded-circle mb-3 mx-auto"
                                 style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
                            <h2 class="font-serif text-uppercase">
                                Kevin Chandra
                            </h2>
                            <p class="m-0">
                                <small class="d-block">
                                    <em>Son of</em>
                                </small>
                                Mr. Gunawan Chandra & Mrs. Susilowati
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card rounded-4 text-center" data-aos="fade-left">
                        <div class="card-body py-5">
                            <img src="https://placekitten.com/300" alt="" class="img-fluid rounded-circle mb-3 mx-auto"
                                 style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
                            <h2 class="font-serif text-uppercase">
                                Fernanda Eka Putri
                            </h2>
                            <p class="m-0">
                                <small class="d-block">
                                    <em>
                                        Daughter of
                                    </em>
                                </small>
                                Mr. Ge Cingkai & Mrs. Lim Liauw Hung San
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
             data-parallax
             data-src="{{ asset('images/banner-save-the-date.jpg') }}"></div>
        <div class="container position-relative text-center" style="z-index: 1">
            <h3 class="text-uppercase text-white display-4 font-serif">
                Saturday,<br>
                September 24<sup style="text-transform: none;">th</sup>, 2022
            </h3>
            <a href="" class="btn btn-secondary" data-aos="fade-down">
                Save The Date
            </a>
            <div class="row mt-5 justify-content-around font-serif">
                <div class="col-md-5">
                    <div class="card mb-4 rounded-4 text-center border-0" data-aos="fade-up">
                        <div class="card-body py-5 px-md-5">
                            <h3 class="card-title display-6 mb-5">
                                Holy Matrimony
                            </h3>
                            @include('components.horizontal-separator')
                            <div class="font-sans-serif mt-5 fw-light">
                                at 11:00
                            </div>
                            <address>
                                <div class="font-sans-serif">St. Aloysius Gonzaga Church</div>
                                <small class="fst-italic">
                                    Jl. Satelit Indah I Bl HN No.1, Tanjungsari, Kec. Sukomanunggal, Kota SBY, Jawa
                                    Timur 60187
                                </small>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card rounded-4 text-center border-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body py-5 px-md-5">
                            <h3 class="card-title display-6 mb-5">
                                Wedding Reception
                            </h3>
                            @include('components.horizontal-separator')
                            <div class="font-sans-serif mt-5 fw-light">
                                at 18:00
                            </div>
                            <address>
                                <div class="font-sans-serif">XO Palace</div>
                                <small class="fst-italic">
                                    Jl. Raya Kupang Indah No.15, Dukuh Kupang, Kec. Dukuhpakis, Kota SBY, Jawa Timur
                                    60225
                                </small>
                            </address>
                            <a href="#mapModal" class="btn btn-secondary text-uppercase" data-bs-toggle="modal">
                                <i class="fas fa-fw fa-map-marker" style="color: #ee2e30"></i>
                                Open Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-4x3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6403243803657!2d112.70499985105243!3d-7.281701673559742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc0ee483ffff%3A0x625015abf9f3022e!2sXO%20Palace!5e0!3m2!1sen!2sid!4v1643895260472!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
    <div id="protocol" style="background-color:var(--color-primary);" class="rounded-4 font-sans-serif">
        <div class="container text-white py-5">
            <p class="text-center mx-auto" style="max-width: 400px">
                Love is caring.<br>
                Your health and safety is very important to us.<br>
                To keep everyone comfortable and safe,
                please follow health protocols.
            </p>
            <div class="row mt-5">
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/wear-mask.png') }}" alt="" class="img-fluid figure-img" style="max-width: 150px">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Wear Mask
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/wash-hands.png') }}" alt="" class="img-fluid figure-img" style="max-width: 150px">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Wash Hands
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/clean-surfaces.png') }}" alt="" class="img-fluid figure-img" style="max-width: 150px">
                        <figcaption class="figure-caption text-white">
                            <div class="lead">
                                Clean Surfaces
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md text-center">
                    <figure class="figure">
                        <img src="{{ asset('images/keep-distance.png') }}" alt="" class="img-fluid figure-img" style="max-width: 150px">
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
    <div class="modal fade" id="modalGift" tabindex="-1" aria-labelledby="modalGiftLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGiftLabel">Wedding Gift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-around align-items-center">
                        <div class="col-md-7">
                            <div class="row text-center text-md-start align-items-center justify-content-center">
                                <div class="col-md-auto col-6">
                                    <img src="https://placekitten.com/250" alt=""
                                         class="img-fluid rounded-circle mb-3 mx-auto">
                                </div>
                                <div class="col-md">
                                    <h3 class="font-sans-serif">
                                        Kevin Chandra
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/S__24076291.jpg') }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="row justify-content-around align-items-center mt-5">
                        <div class="col-md-7">
                            <div class="row text-center text-md-start align-items-center justify-content-center">
                                <div class="col-md-auto col-6">
                                    <img src="https://placekitten.com/250" alt=""
                                         class="img-fluid rounded-circle mb-3 mx-auto">
                                </div>
                                <div class="col-md">
                                    <h3 class="font-sans-serif">
                                        Fernanda Eka Putri
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/S__24076291.jpg') }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="gift" style="height: 100vh;"
         class="d-flex align-items-center justify-content-center position-relative overflow-hidden">
        <div class="simple-parallax--faster decoration-3">
            <img src="{{ asset('images/decoration-3.png') }}" alt="" class="img-fluid">
        </div>
        <div class="simple-parallax decoration-4">
            <img src="{{ asset('images/decoration-4.png') }}" alt="" class="img-fluid">
        </div>
        <div class="container text-center position-relative" style="z-index: 1">
            <h1 class="text-uppercase font-serif display-5 mb-5">
                Wedding Gift
            </h1>
            @include('components.horizontal-separator')
            <button class="btn btn-secondary text-uppercase mt-5" data-bs-toggle="modal" data-bs-target="#modalGift">
                <i class="fas fa-gift fa-fw"></i>
                Send Gift
            </button>
        </div>
    </div>
    <div id="cta" class="darkened-overlay"
         style="background-repeat: no-repeat; background-size: cover; background-position: center bottom; padding-top: 10%; padding-bottom: 10%"
         data-parallax
         data-src="{{ asset('images/banner-cta.jpg') }}">
        <div class="container text-white py-5 my-5 text-center position-relative font-serif" style="z-index: 2">
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
                <h1 class="font-serif mb-5">
                    RSVP
                </h1>
                @include('components.horizontal-separator')
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <form action="" class="mt-4 font-sans-serif"
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
{{--<script src="https://cdn.jsdelivr.net/npm/jquery-parallax.js@1.5.0/parallax.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>
<script src="{{ asset('js/jquery.parallax.min.js') }}"></script>
{{--<audio src="{{ asset('uploads/bgm-cant-help-falling-in-love-elvis.mp3') }}" loop autoplay controls id="bgm"></audio>--}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>

<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div id="player" style="display: none;"></div>
<div id="controls" class="shadow">
    <button class="btn p-0" id="btn_play">
        <i class="fas fa-fw fa-xs fa-play"></i>
    </button>
    <button class="btn p-0 d-none" id="btn_pause">
        <i class="fas fa-fw fa-xs fa-pause"></i>
    </button>
</div>
<div class="modal fade" id="invitationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="invitationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 justify-content-center">
                <div class="text-center">
                    <small class="d-block" style="font-size: 12px;">
                        You are cordially invited to
                    </small>
                    the wedding of<br>
                    <h5 class="modal-title">
                        <strong>Kevin & Fernanda</strong>
                    </h5>
                </div>
            </div>
            <div class="modal-body text-center pb-0">
                Dear
                <h3 class="modal-title" style="line-height: 1.2;">
                    {{ $guestName }}
                </h3>
                <small class="fst-italic text-muted mt-5 d-block" style="font-size: 12px;">
                    We apologize if there are misspelling of your name/title
                </small>
            </div>
            <div class="modal-footer border-0 justify-content-center pt-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Buka Undangan
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = 'https://www.youtube.com/iframe_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            videoId: 'vGJTaP6anOU',
            playerVars: {
                'playsinline': 1
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    // function onPlayerReady(event) {
    //     event.target.playVideo();
    // }

    // // 5. The API calls this function when the player's state changes.
    // //    The function indicates that when playing a video (state=1),
    // //    the player should play for six seconds and then stop.
    // var done = false;
    //
    // function onPlayerStateChange(event) {
    //     if (event.data == YT.PlayerState.PLAYING && !done) {
    //         setTimeout(stopVideo, 6000);
    //         done = true;
    //     }
    // }

    function stopVideo() {
        player.stopVideo();
    }

    var $play = $('#btn_play');
    var $pause = $('#btn_pause');

    function playTrack() {
        $play.addClass('d-none');
        $pause.removeClass('d-none');
        player.playVideo();
    }

    function pauseTrack() {
        $play.removeClass('d-none');
        $pause.addClass('d-none');
        player.pauseVideo();
    }

    $play.click(function(e) {
        e.preventDefault();
        playTrack();
    });

    $pause.click(function(e) {
        e.preventDefault();
        pauseTrack();
    });
</script>
<script>
    AOS.init();

    var lazyParallax = window.lozad('.parallax-slider');
    lazyParallax.observe();

    const observer = window.lozad('[data-lazy]');
    observer.observe();

    var images = document.querySelectorAll('.simple-parallax');
    new simpleParallax(images, {
        overflow: true
    });

    var fastParallax = document.querySelectorAll('.simple-parallax--faster');
    new simpleParallax(fastParallax, {
        overflow: true,
        scale: 2
    });

    var invitationModal = new bootstrap.Modal(document.getElementById('invitationModal'));
    invitationModal.show();

    document.getElementById('invitationModal').addEventListener('hidden.bs.modal', function(event) {
        playTrack();
    });
</script>
</body>
</html>
