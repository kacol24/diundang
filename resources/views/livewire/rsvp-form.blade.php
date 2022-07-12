<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('rsvp.store') }}" method="POST" class="mt-4 font-sans-serif" id="RsvpForm"
          wire:submit.prevent="save"
          @rsvp-created.window="function(event) { window.history.replaceState('', '', '{{ route('home') }}?guest=' + event.detail.guest); }"
          x-data="{
            name: '{{ addslashes(optional($invitation)->name) ?? "" }}',
            attend: '{{ $isAttending }}',
            pax: '{{ optional($invitation)->pax }}'
          }">
        @csrf
        <div class="mb-3">
            <label class="fw-bold" for="name">
                {{ __('Your Name') }}
            </label>
            <input type="hidden" name="guest_code" value="{{ optional($invitation)->guest_code }}">
            <input type="text"
                   @if($invitation)
                   class="form-control-plaintext"
                   readonly
                   value="{{ $guestName }}"
                   @else
                   class="form-control"
                   x-model="name"
                   wire:model="guestName"
                   @endif
                   id="name">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-md-5 mb-3">
                    <label class="fw-bold mb-2">
                        {{ __('Attend Reception') }}
                    </label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                   id="inlineRadio1" value="1"
                                   x-model="attend"
                                   wire:model="isAttending">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                   id="inlineRadio2" value="0"
                                   x-model="attend"
                                   wire:model="isAttending">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <div
                        x-show="attend === '1'"
                        x-transition>
                        <label class="fw-bold" for="pax">
                            {{ __('How many people will attend?') }}
                        </label>
                        <select class="form-select" id="pax" style="font-size: inherit;"
                                x-model="pax"
                                wire:model="guests">
                            <option selected value="" disabled hidden>
                                {{ __('How many people will attend?') }}
                            </option>
                            @foreach(range($invitation->guests ?? 2, 1) as $guest)
                                <option value="{{ $guest }}">
                                    {{ $guest }} {{ \Str::plural(__('person'), $guest) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4 offset-md-4 text-center">
                <button type="submit" class="btn btn-secondary disabled rounded-pill" disabled
                        :disabled="!pax"
                        :class="{ 'disabled': !pax }">
                    @if(optional($invitation)->rsvp_at)
                        {{ __('Update RSVP') }}
                    @else
                        {{ __('Confirm') }}
                    @endif
                </button>
            </div>
            <div class="col-md-4 text-end">
                <a href="#" style="color: var(--color-secondary);">
                    <small class="fst-italic">
                        {{ __('Show QR Invitation') }}
                    </small>
                </a>
            </div>
        </div>
        <small class="text-muted">
            <br>
            <em>
                * {!! __('rsvp_section.trouble', ['groom' => '<a href="https://wa.me/6282233662728?text='. urlencode('Hi, this is '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Kevin</a>', 'bride' => '<a href="https://wa.me/6282244872421?text='. urlencode('Hi, '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Fernanda</a>']) !!}
            </em>
        </small>
    </form>
</div>
