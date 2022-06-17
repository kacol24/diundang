<div id="rsvp" class="my-5 py-5">
    <div class="container my-5 py-5">
        <div class="text-center">
            <h1 class="font-serif mb-5">
                RSVP
            </h1>
            @include('components.horizontal-separator')
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                Please kindly help us prepare everything better by confirming your attendance to our wedding event
                with the following RSVP form
                <form action="{{ route('rsvp.store') }}" method="POST" class="mt-4 font-sans-serif"
                      x-data="{
                            attend: '',
                            pax: ''
                          }">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-bold">
                            Your Name
                        </label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                               value="{{ $guestName }}"
                               aria-label="your name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold">
                                    Attend Reception
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
                                    <label class="fw-bold">
                                        How many people will attend?
                                    </label>
                                    <select class="form-select">
                                        <option selected value="" disabled hidden>
                                            How many people will attend?
                                        </option>
                                        @foreach(range(1, $invitation->guests ?? 2) as $guest)
                                            <option value="{{ $guest }}"
                                                {{ $loop->last ? 'selected' : '' }}>
                                                {{ $guest }} {{ \Str::plural('person', $guest) }}
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
                            Confirm
                        </button>
                    </div>
                    <small class="text-muted">
                        <br>
                        <em>
                            * Having trouble with the RSVP form? Please contact <a
                                href="https://wa.me/6282233662728?text={{ urlencode('Hi, this is '. $guestName .'! I want to confirm my attendance to your wedding reception.') }}">Kevin</a>
                            or <a
                                href="https://wa.me/6282244872421?text={{ urlencode('Hi, '. $guestName .'! I want to confirm my attendance to your wedding reception.') }}">Fernanda</a>
                            directly to confirm your attendance.
                        </em>
                    </small>
                </form>
            </div>
        </div>
    </div>
</div>
