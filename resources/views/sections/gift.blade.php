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

@push('before_scripts')
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
                                    <img src="{{ asset('images/kevin.jpg') }}" alt="kevin"
                                         class="img-fluid rounded-circle mb-3 mx-auto w-100" style="max-width: 250px">
                                </div>
                                <div class="col-md">
                                    <h3 class="font-sans-serif">
                                        Kevin Chandra
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/QR_8630064181.jpeg') }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="row justify-content-around align-items-center mt-5">
                        <div class="col-md-7">
                            <div class="row text-center text-md-start align-items-center justify-content-center">
                                <div class="col-md-auto col-6">
                                    <img src="{{ asset('images/nanda.jpg') }}" alt=""
                                         class="img-fluid rounded-circle mb-3 mx-auto w-100" style="max-width: 250px">
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
@endpush
