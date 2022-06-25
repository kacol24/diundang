<div id="rsvp" class="my-5 py-5 pt-3 mt-0">
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="font-serif mb-5 h3">
                {{ __('RSVP') }}
            </h2>
            @include('components.horizontal-separator')
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <livewire:rsvp-form :invitation="$invitation" :guestName="$guestName"/>
            </div>
        </div>
    </div>
</div>
