<div id="rsvp" class="my-5 py-5 pt-0 mt-0">
    <div class="container">
        <div class="text-center">
            <h1 class="font-serif mb-5">
                {{ __('RSVP') }}
            </h1>
            @include('components.horizontal-separator')
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                {{ __('Please kindly help us prepare everything better by confirming your presence to our wedding event with the following RSVP form') }}:
                <form action="{{ route('rsvp.store') }}" method="POST" class="mt-4 font-sans-serif" id="RsvpForm"
                      x-data="{
                            name: '{{ $invitation->name ?? "" }}',
                            attend: '',
                            pax: ''
                          }">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-bold" for="name">
                            {{ __('Your Name') }}
                        </label>
                        <input type="text"
                               @if($invitation)
                                   class="form-control-plaintext"
                               readonly
                               value="{{ $guestName }}"
                               @else
                                   class="form-control"
                               x-model="name"
                               @endif
                               id="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-md-5 mb-3">
                                <label class="fw-bold">
                                    {{ __('Attend Reception') }}
                                </label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio1" value="yes"
                                               x-model="attend">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio2" value="no"
                                               x-model="attend">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div
                                    x-show="attend === 'yes'"
                                    x-transition>
                                    <label class="fw-bold" for="pax">
                                        {{ __('How many people will attend?') }}
                                    </label>
                                    <select class="form-select" id="pax"
                                            x-model="pax" style="font-size: inherit;">
                                        <option selected value="" disabled hidden>
                                            {{ __('How many people will attend?') }}
                                        </option>
                                        @foreach(range(1, $invitation->guests ?? 2) as $guest)
                                            <option value="{{ $guest }}">
                                                {{ $guest }} {{ \Str::plural(__('person'), $guest) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary disabled" disabled
                                :disabled="!pax"
                                :class="{ 'disabled': !pax }">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                    <small class="text-muted">
                        <br>
                        <em>
                            * {!! __('rsvp_section.trouble', ['groom' => '<a href="https://wa.me/6282233662728?text='. urlencode('Hi, this is '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Kevin</a>', 'bride' => '<a href="https://wa.me/6282244872421?text='. urlencode('Hi, '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Fernanda</a>']) !!}
                        </em>
                    </small>
                </form>
            </div>
        </div>
    </div>
</div>
