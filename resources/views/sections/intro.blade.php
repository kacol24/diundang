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
            <h1 class="text-uppercase h3 font-serif">
                {{ __('Tie The Knot') }}
            </h1>
            <p style="max-width: 430px" class="mx-auto">
                {{ __('By the love and grace of the Lord') }},<br>
                {{ __('we cordially request the honour of your presence to celebrate our marriage') }}
            </p>
        </div>
        <div class="row py-5 justify-content-around overflow-hidden">
            <div class="col-lg-5">
                <div class="card rounded-4 mb-4 mb-lg-0 text-center" data-aos="fade-right">
                    <div class="card-body py-5">
                        <img src="{{ asset('images/groom.jpg') }}" alt=""
                             class="img-fluid rounded-circle mb-3 mx-auto"
                             style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
                        <h2 class="font-serif text-uppercase h5">
                            KEVIN CHANDRA
                        </h2>
                        <p class="m-0">
                            <small class="d-block">
                                <em>
                                    {{ __('The only son of') }}
                                </em>
                            </small>
                            <span class="text-nowrap">{{ __('Mr.') }} Tjen Gunawan Chandra (陳劲源)</span> &<br>
                            <span class="text-nowrap">{{ __('Mrs.') }} Susilowati (何瑞珠)</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card rounded-4 text-center h-100" data-aos="fade-left">
                    <div class="card-body py-5">
                        <img src="{{ asset('images/nanda.jpg') }}" alt=""
                             class="img-fluid rounded-circle mb-3 mx-auto"
                             style="max-width: 150px" data-aos="fade-down" data-aos-delay="300">
                        <h2 class="font-serif text-uppercase h5">
                            FERNANDA EKA PUTRI
                        </h2>
                        <p class="m-0">
                            <small class="d-block">
                                <em>
                                    {{ __('The first daughter, second child of') }}
                                </em>
                            </small>
                            <span class="text-nowrap">{{ __('Mr.') }} Ge Cing Kai</span> &<br>
                            <span class="text-nowrap">{{ __('Mrs.') }} Liauw Hung San</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
