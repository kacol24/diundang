<div id="gallery" class="py-3"
     x-data>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <a href="#galleryModal" data-bs-toggle="modal" class="position-relative d-block">
                    <div
                        class="position-absolute w-100 h-100 top-0 start-0 d-flex align-items-center justify-content-center"
                        style="background-color:rgba(0, 0, 0, .4);">
                        <div class="text-center text-white" style="margin-top: 50%;">
                            <i class="fa-solid fa-hand-pointer fa-lg fa-fw"></i>
                            <div class="mt-3 mb-0 font-serif">
                                View Album
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('images/album-cover-front.jpg') }}"
                         class="img-fluid w-100 user-select-none"
                         draggable="false" alt="album cover front">
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0" style="background-color:transparent;">
                <div class="modal-header px-0 py-1 border-0 justify-content-end" style="background-color:transparent;">
                    <button type="button" class="text-white btn p-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-2x"></i>
                    </button>
                </div>
                <div class="modal-body p-0 border-0" style="background-color:transparent;">
                    <div class="container overflow-hidden px-0"
                         @resize.window.debounce="window.innerWidth >= 992 ? $flipbook.turn('display', 'double') : $flipbook.turn('display', 'single')"
                         x-init="window.innerWidth >= 992 ? $flipbook.turn('display', 'double') : $flipbook.turn('display', 'single')">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="ratio responsive">
                                    <div>
                                        <div id="flipbook" class="shadow">
                                            <div class="hard">
                                                <img src="{{ asset('images/album-cover-front.jpg') }}"
                                                     class="img-fluid w-100 user-select-none"
                                                     draggable="false" alt="album cover front">
                                            </div>
                                            @foreach([
                                                        'ROB00302.jpg',
                                                        'ROB00450.jpg',
                                                        'ROB00458.jpg',
                                                        'ROB00520.jpg',
                                                        'ROB00667.jpg',
                                                    ] as $gallery)
                                                <div>
                                                    <div class="gradient"></div>
                                                    <div class="p-5">
                                                        <img src="{{ asset('images/gallery/' . $gallery) }}"
                                                             class="img-fluid w-100 user-select-none" draggable="false"
                                                             alt="photo {{ $gallery }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="hard">
                                                <img src="{{ asset('images/album-cover-back.jpg') }}"
                                                     class="img-fluid w-100 user-select-none"
                                                     draggable="false" alt="album cover back">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center py-1">
                    <div>
                        <button class="btn text-white me-5"
                                @click="$flipbook.turn('previous')">
                            <i class="fa-solid fa-backward fa-fw fa-2x"></i>
                        </button>
                        <button class="btn text-white ms-5"
                                @click="$flipbook.turn('next')">
                            <i class="fa-solid fa-forward fa-fw fa-2x"></i>
                        </button>
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
        var $flipbook = $('#flipbook');
        $flipbook.turn({
            autoCenter: true,
            display: 'single'
        });
        $flipbook.turn('peel', 'br');
        var galleryModal = document.getElementById('galleryModal');
        galleryModal.addEventListener('show.bs.modal', function(event) {
            window.dispatchEvent(new Event('resize'));
        });
    </script>
@endpush
