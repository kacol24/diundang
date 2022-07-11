<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <a href="#galleryModal" data-bs-toggle="modal">
                <img src="{{ asset('images/album-cover-front.jpg') }}"
                     class="img-fluid w-100 user-select-none"
                     draggable="false">
            </a>
        </div>
    </div>
</div>
<style>
    #gallery .btn-close {
        opacity: 1;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat !important;
    }
</style>
<div id="gallery" class="py-3">
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0" style="background-color:transparent;">
                <div class="modal-header border-0" style="background-color:transparent;">
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 border-0" style="background-color:transparent;">
                    <div class="container overflow-hidden"
                         @resize.window.debounce="window.innerWidth >= 992 ? $('#flipbook').turn('display', 'double') : $('#flipbook').turn('display', 'single')"
                         x-init="window.innerWidth >= 992 ? $('#flipbook').turn('display', 'double') : $('#flipbook').turn('display', 'single')"
                         x-data>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="ratio responsive">
                                    <div>
                                        <div id="flipbook" class="shadow">
                                            <div class="hard">
                                                <img src="{{ asset('images/album-cover-front.jpg') }}"
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
                                                <img src="{{ asset('images/album-cover-back.jpg') }}"
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
            </div>
        </div>
    </div>
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
            --bs-aspect-ratio: {{ 3/2.19 * 100 }}%;
        }

        @media (min-width: 992px) {
            .ratio.responsive {
                --bs-aspect-ratio: {{ 3/4.264 * 100 }}%;
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
        }
    </style>
    <script src="{{ asset('js/turn.min.js') }}"></script>
    <script type="text/javascript">
        $('#flipbook').turn({
            autoCenter: true,
            display: 'single'
        });
        $('#flipbook').turn('peel', 'br');
        var galleryModal = document.getElementById('galleryModal');
        galleryModal.addEventListener('show.bs.modal', function(event) {
            window.dispatchEvent(new Event('resize'));
        });
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
