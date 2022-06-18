<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f8ea23cad3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.min.css">
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <title>The Wedding of Kevin & Fernanda</title>
    <meta name="description"
          content="Dear {{ $guestName }}, you are cordially invited to celebrate the wedding of Kevin and Fernanda on September 24th, 2022.">
    <meta property="og:image" content="{{ asset('images/logo-initials.png') }}"/>
    <meta property="og:image:width" content="194"/>
    <meta property="og:image:height" content="143"/>

    <script src="https://cdn.jsdelivr.net/npm/lozad@1.16.0/dist/lozad.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans-serif">
<div class="modal fade" id="invitationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="invitationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 justify-content-center">
                <div class="text-center">
                    <small class="d-block mb-1">
                        {{ __('You are cordially invited to the wedding of') }}
                    </small>
                    <h4 class="modal-title">
                        <strong class="font-serif text-uppercase">Kevin & Fernanda</strong>
                    </h4>
                </div>
            </div>
            <div class="modal-body text-center py-5">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="py-5">
                        {{ __('Dear') }}
                        <h3 class="modal-title">
                            {{ $guestName }}
                        </h3>
                        <small class="fst-italic text-muted d-block mt-3">
                            <small>
                                {{ __('We apologize if there are misspelling of your name or title') }}
                            </small>
                        </small>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
{{--                <div class="dropdown">--}}
{{--                    <button type="button" class="btn btn-secondary" aria-expanded="false"--}}
{{--                            data-bs-toggle="dropdown">--}}
{{--                        {{ __('See Invitation') }}--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li>--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Choose Language--}}
{{--                            </h6>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                English--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                Bahasa Indonesia--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('See Invitation') }}
                </button>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    @include('sections.hero')

    @include('includes.header')

    @include('sections.intro')
    @include('sections.save-the-date')
    @include('sections.gallery')
    @include('sections.rsvp')
    @include('sections.protocol')

    @include('includes.footer')
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
@stack('before_scripts')
<script
    src="https://cdn.jsdelivr.net/combine/npm/masonry.js@3.1.5/dist/masonry.pkgd.min.js,npm/imagesloaded@5.0.0/imagesloaded.pkgd.min.js,npm/simple-parallax-js@5.6.2,npm/@fancyapps/ui@4.0.27,npm/aos@2.3.4"></script>
<script src="{{ asset('js/jquery.parallax.min.js') }}"></script>
{{--<audio src="{{ asset('uploads/bgm-cant-help-falling-in-love-elvis.mp3') }}" loop autoplay controls id="bgm"></audio>--}}

<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div id="player" style="display: none;"></div>
<div class="position-fixed ps-3 text-white text-nowrap rounded-pill overflow-hidden align-items-center invisible"
     id="now_playing"
     data-aos="fade-left"
     data-aos-duration="1000"
     data-aos-offset="-1000"
     data-aos-delay="3000"
     style="background-color: rgba(0, 0, 0, .7);z-index: 1040; bottom: 20px;left: 15px; right: 20px; padding-right: 35px; height: 30px; font-size: 12px; display: flex; max-width: 500px">
    <marquee>
        {{ __('Now playing') }}: Love Will Find A Way (End Title) · Heather Headley · Kenny Lattimore
    </marquee>
</div>
<div id="controls" class="shadow-sm">
    <button class="btn p-0" id="btn_play">
        <i class="fas fa-fw fa-xs fa-play"></i>
    </button>
    <button class="btn p-0 d-none" id="btn_pause">
        <i class="fas fa-fw fa-xs fa-pause"></i>
    </button>
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
    var playPlease = false;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            videoId: 'szqxa_Ebs0I',
            playerVars: {
                'playsinline': 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        if (playPlease) {
            playTrack();
        }
    }

    // // 5. The API calls this function when the player's state changes.
    // //    The function indicates that when playing a video (state=1),
    // //    the player should play for six seconds and then stop.
    // var done = false;
    //
    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
            player.playVideo();
        }
    }

    function stopVideo() {
        player.stopVideo();
    }

    var $play = $('#btn_play');
    var $pause = $('#btn_pause');

    function playTrack() {
        if (player) {
            $play.addClass('d-none');
            $pause.removeClass('d-none');
            player.playVideo();
            $('#now_playing').removeClass('invisible');
            setTimeout(function() {
                $('#now_playing').fadeOut();
            }, 10000);
        }
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

    var invitationModal = new bootstrap.Modal(document.getElementById('invitationModal'));
        invitationModal.show();

    document.getElementById('invitationModal').addEventListener('hidden.bs.modal', function(event) {
        playPlease = true;
        playTrack();
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
</script>
@stack('after_scripts')
</body>
</html>
