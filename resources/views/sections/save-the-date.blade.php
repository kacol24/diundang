<div id="save_the_date" class="position-relative pb-5" style="padding-top: 150px;">
    <div class="position-absolute w-100 darkened-overlay"
         style="top: 0;left: 0; height: 80%; background-repeat: no-repeat; background-size: cover; background-position: center bottom"
         data-parallax
         data-src="{{ asset('images/JES03880.jpg') }}"></div>
    <div class="container position-relative text-center" style="z-index: 1">
        <h3 class="text-uppercase text-white h2 font-serif lh-base">
            {{ __('Saturday') }},<br>
            September <span style="letter-spacing: 3px;">24<sup style="text-transform: none;">th</sup></span>, 2022
        </h3>
        <div data-aos="fade-down"
             x-data>
            <template x-if="$store.isIos">
                <a href="data:text/calendar;charset=utf8,BEGIN:VCALENDAR%0AVERSION:2.0%0ABEGIN:VEVENT%0ADTSTART:20220924T110000Z%0ADTEND:20220924T150000Z%0ASUMMARY:The%20Wedding%20of%20Kevin%20%26%20Fernanda%0ADESCRIPTION:The%20Wedding%20of%20Kevin%20%26%20Fernanda%0ALOCATION:XO%20Palace%0AEND:VEVENT%0AEND:VCALENDAR%0A"
                   target="_blank" class="btn btn-secondary rounded-pill">
                    {{ __('Save The Date') }}
                </a>
            </template>
            <template x-if="!$store.isIos">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=20220924T110000Z%2F20220924T150000Z&details=The%20Wedding%20of%20Kevin%20%26%20Fernanda&location=XO%20Palace&text=The%20Wedding%20of%20Kevin%20%26%20Fernanda"
                   target="_blank" class="btn btn-secondary rounded-pill">
                    {{ __('Save The Date') }}
                </a>
            </template>
        </div>
        <div class="row justify-content-center text-white mt-5 pb-5 font-sans-serif g-1" id="countdown">
            <div class="col-2 col-md-1">
                <h3 class="fw-normal mb-0" x-text="time.days">00</h3>
                <small>
                    Days
                </small>
            </div>
            <div class="col-auto">
                <div class="mt-1">
                    :
                </div>
            </div>
            <div class="col-2 col-md-1">
                <h3 class="fw-normal mb-0" x-text="time.hours">00</h3>
                <small>
                    Hrs
                </small>
            </div>
            <div class="col-auto">
                <div class="mt-1">
                    :
                </div>
            </div>
            <div class="col-2 col-md-1">
                <h3 class="fw-normal mb-0" x-text="time.minutes">00</h3>
                <small>
                    Mins
                </small>
            </div>
            <div class="col-auto">
                <div class="mt-1">
                    :
                </div>
            </div>
            <div class="col-2 col-md-1">
                <h3 class="fw-normal mb-0" x-text="time.seconds">00</h3>
                <small>
                    Secs
                </small>
            </div>
        </div>
        <div class="row mt-5 justify-content-around font-serif">
            <div class="col-lg-5">
                <div class="card mb-4 rounded-4 text-center border-0" data-aos="fade-up">
                    <div class="card-body py-5 px-md-5">
                        <h3 class="card-title mb-5 h3">
                            {{ __('Holy Matrimony') }}
                        </h3>
                        @include('components.horizontal-separator')
                        <div class="font-sans-serif mt-5 fw-light">
                            {{ __('at') }} 11:00
                        </div>
                        <address>
                            <div class="font-sans-serif">
                                {{ __('St. Yakobus Catholic Church') }}
                            </div>
                            <small class="fst-italic">
                                Jl. Puri Widya Kencana LL-1, Citraland, Surabaya
                            </small>
                        </address>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card rounded-4 text-center border-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-body py-5 px-md-5">
                        <h3 class="card-title mb-5 h3">
                            {{ __('Wedding Reception') }}
                        </h3>
                        @include('components.horizontal-separator')
                        <div class="font-sans-serif mt-5 fw-light">
                            {{ __('at') }} 18:00
                        </div>
                        <address>
                            <div class="font-sans-serif">XO Palace</div>
                            <small class="fst-italic">
                                Jl. Raya Kupang Indah No.15, Dukuh Kupang, Kec. Dukuhpakis, Kota SBY, Jawa Timur
                                60225
                            </small>
                        </address>
                        <a href="https://goo.gl/maps/awjipcfW3aGRyvte9" class="btn btn-secondary text-uppercase btn-sm rounded-pill" target="_blank">
                            <i class="fas fa-fw fa-map-marker" style="color: #ee2e30"></i>
                            {{ __('Get Direction') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--@push('before_scripts')--}}
{{--    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header border-0">--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body p-0">--}}
{{--                    <div class="ratio ratio-4x3">--}}
{{--                        <iframe--}}
{{--                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6403243803657!2d112.70499985105243!3d-7.281701673559742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc0ee483ffff%3A0x625015abf9f3022e!2sXO%20Palace!5e0!3m2!1sen!2sid!4v1643895260472!5m2!1sen!2sid"--}}
{{--                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endpush--}}

@push('after_scripts')
    <script>
        $('#countdown').countdown('2022/09/24 18:00:00', function(event) {
            $('[x-text="time.days"]').html(event.strftime('%D'));
            $('[x-text="time.hours"]').html(event.strftime('%H'));
            $('[x-text="time.minutes"]').html(event.strftime('%M'));
            $('[x-text="time.seconds"]').html(event.strftime('%S'));
        });

        document.addEventListener('alpine:init', function() {
            var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
            Alpine.store('isIos', isIOS);
        });
    </script>
@endpush
