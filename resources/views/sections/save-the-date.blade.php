<div id="save_the_date" class="position-relative pb-5" style="padding-top: 150px;">
    <div class="position-absolute w-100 darkened-overlay"
         style="top: 0;left: 0; height: 80%; background-repeat: no-repeat; background-size: cover; background-position: center bottom"
         data-parallax
         data-src="{{ asset('images/ROB00394.jpg') }}"></div>
    <div class="container position-relative text-center" style="z-index: 1">
        <h3 class="text-uppercase text-white display-4 font-serif sm:text-base lh-base">
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
                            <div class="font-sans-serif">
                                St. Yakobus Catholic Church
                            </div>
                            <small class="fst-italic">
                                Jl. Puri Widya Kencana LL-1, Citraland, Surabaya
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
                            Get Direction
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('before_scripts')
    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
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
@endpush
