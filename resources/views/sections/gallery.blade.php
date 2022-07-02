<div id="gallery" class="py-3">
    {{--    <div class="container">--}}
    {{--        <div class="row grid" id="gallery_lightbox">--}}
    {{--            @foreach([--}}
    {{--                'ROB00520.jpg',--}}
    {{--                'gallery.jpeg',--}}
    {{--                'ROB00812.jpg',--}}
    {{--                'ROB00667.jpg',--}}
    {{--                'ROB00398.jpg',--}}
    {{--            ] as $gallery)--}}
    {{--                <div class="col-md-4 grid-item">--}}
    {{--                    <figure class="figure figure-credit">--}}
    {{--                        <a href="{{ asset('images/gallery/' . $gallery) }}"--}}
    {{--                           class="link-secondary text-decoration-none"--}}
    {{--                           data-fancybox="gallery"--}}
    {{--                           data-caption='<span style="font-size: 8px">{{ __('Photo by') }} - <a href="https://www.instagram.com/explore/tags/summerstoryrobert/" target="_blank" class="link-light">#summerstoryrobert</a></span>'>--}}
    {{--                            <img src="{{ asset('images/gallery/' . $gallery) }}"--}}
    {{--                                 class="img-fluid w-100 figure-img m-0" alt="gallery image {{ $loop->iteration }}">--}}
    {{--                        </a>--}}
    {{--                        <figcaption class="figure-caption" style="font-size: 8px;">--}}
    {{--                            {{ __('Photo by') }} - <a href="https://www.instagram.com/explore/tags/summerstoryrobert/"--}}
    {{--                                          target="_blank"--}}
    {{--                                          class="link-secondary">#summerstoryrobert</a>--}}
    {{--                        </figcaption>--}}
    {{--                    </figure>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="container overflow-hidden py-5"
         @resize.window.debounce="window.innerWidth >= 992 ? $('#flipbook').turn('display', 'double') : $('#flipbook').turn('display', 'single')"
         x-init="window.innerWidth >= 992 ? $('#flipbook').turn('display', 'double') : $('#flipbook').turn('display', 'single')"
         x-data>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="ratio responsive">
                    <div>
                        <div id="flipbook" class="shadow">
                            <div class="hard">
                                <img src="{{ asset('images/cover-front.jpg') }}"
                                     class="img-fluid w-100 user-select-none"
                                     draggable="false">
                            </div>
                            @foreach([
                                        //'ROB00520.jpg',
                                        'gallery.jpeg',
                                        //'ROB00812.jpg',
                                        'ROB00667.jpg',
                                        'ROB00398.jpg',
                                        'ROB00667.jpg',
                                        'ROB00398.jpg',
                                        'ROB00667.jpg',
                                        'ROB00398.jpg',
                                        'ROB00667.jpg',
                                        'ROB00398.jpg',
                                        'ROB00667.jpg',
                                        'ROB00398.jpg',
                                        'ROB00667.jpg',
                                    ] as $gallery)
                                <div>
                                    <div class="gradient"></div>
                                    <div class="p-5">
                                        <img src="{{ asset('images/gallery/' . $gallery) }}"
                                             class="img-fluid w-100 user-select-none" draggable="false">
                                    </div>
                                </div>
                            @endforeach
                            <div class="hard">
                                <img src="{{ asset('images/cover-back.jpg') }}"
                                     class="img-fluid w-100 user-select-none"
                                     draggable="false">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('after_scripts')
    <style>
        #flipbook {
            width: 100% !important;
            height: 100% !important;
        }

        .page {
            background-color: white;
        }

        .ratio.responsive {
            --bs-aspect-ratio: {{ 4/3 * 100 }}%;
        }

        @media (min-width: 992px) {
            .ratio.responsive {
                --bs-aspect-ratio: {{ 3/4 * 100 }}%;
            }
        }

        .even .gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url({{ asset('images/right-border.png') }});
            background-position: right top;
            background-repeat: repeat-y;
        }

        .odd .gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url({{ asset('images/left-border.png') }});
            background-position: left top;
            background-repeat: repeat-y;
        }
    </style>
    <script src="{{ asset('js/turn.min.js') }}"></script>
    <script type="text/javascript">
        $('#flipbook').turn({
            autoCenter: true,
            display: 'single',
        });
        $('#flipbook').turn('peel', 'br');
    </script>
    <script>
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item'
        });
        $grid.imagesLoaded().progress(function() {
            $grid.masonry('layout');
        });
    </script>
@endpush
