<div id="protocol" style="background-color:var(--color-primary);" class="font-sans-serif">
    <div class="container text-white py-5">
        <p class="text-center mx-auto" style="max-width: 400px">
            {{ __('Love is caring') }}.<br>
            {{ __('Your health and safety is very important to us') }}.
            {{ __('To keep everyone comfortable and safe, please comply with these health protocols') }}
        </p>
        <div class="row mt-5">
            <div class="col-6 col-md text-center mb-4 mb-md-0">
                <figure class="figure">
                    <img src="{{ asset('images/wear-mask.png') }}" alt="" class="img-fluid figure-img"
                         style="max-width: 110px">
                    <figcaption class="figure-caption text-white">
                        <div class="fs-6">
                            {{ __('Wear Mask') }}
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-6 col-md text-center mb-4 mb-md-0">
                <figure class="figure">
                    <img src="{{ asset('images/wash-hands.png') }}" alt="" class="img-fluid figure-img"
                         style="max-width: 110px">
                    <figcaption class="figure-caption text-white">
                        <div class="fs-6">
                            {{ __('Wash Hands') }}
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-6 col-md text-center">
                <figure class="figure">
                    <img src="{{ asset('images/clean-surfaces.png') }}" alt="" class="img-fluid figure-img"
                         style="max-width: 110px">
                    <figcaption class="figure-caption text-white">
                        <div class="fs-6">
                            {{ __('Clean Surfaces') }}
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-6 col-md text-center">
                <figure class="figure">
                    <img src="{{ asset('images/keep-distance.png') }}" alt="" class="img-fluid figure-img"
                         style="max-width: 110px">
                    <figcaption class="figure-caption text-white">
                        <div class="fs-6">
                            {{ __('Social Distancing') }}
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>
