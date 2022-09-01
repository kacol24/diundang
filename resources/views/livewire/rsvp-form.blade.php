<div
    x-data="{
    name: '{{ addslashes(optional($invitation)->name) ?? "" }}',
    attend: '{{ $isAttending }}',
    pax: '{{ optional($invitation)->pax }}'
  }">
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Digital Invitation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                @if($invitation)
                    <div class="modal-body p-0">
                        <img
                            src="{{ asset("storage/{$invitation['guest_code']}.jpg") }}?v={{ now()->timestamp }}"
                            alt="qr code"
                            class="img-fluid w-100">
                    </div>
                    <div class="modal-footer justify-content-start">
                        <small class="fst-italic">
                            You can <a
                                href="{{ route('download', ['guest' => $invitation['guest_code']]) }}"
                                target="_blank"
                                style="color: var(--color-secondary)">download</a> this digital invitation,
                            screenshot
                            this page, or save the QR Code as image.
                        </small>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('rsvp.store') }}" method="POST" class="mt-4 font-sans-serif" id="RsvpForm"
          wire:submit.prevent="save"
          @rsvp-created.window="function(event) { window.history.replaceState('', '', '{{ route('home') }}?guest=' + event.detail.guest); }">
        @csrf
        <fieldset class="position-relative"
                  wire:loading.attr="disabled" wire:target="save">
            <div class="position-absolute start-0 top-0 w-100 h-100 align-items-center justify-content-center"
                 style="background-color:rgba(255, 255, 255, .7);"
                 wire:loading.flex wire:target="save">
                <div>
                    <i class="fas fa-refresh fa-fw fa-spin text-color:blue fa-lg"></i>
                </div>
            </div>
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
                       wire:model.defer="guestName"
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
                                       wire:model.defer="isAttending">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                       id="inlineRadio2" value="0"
                                       x-model="attend"
                                       wire:model.defer="isAttending">
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
                                    wire:model.defer="guests">
                                <option selected value="" disabled>
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
                            :disabled="!name || !attend || (!pax && attend == 1)"
                            :class="{ 'disabled': !name || !attend || (!pax && attend == 1) }">
                        @if(optional($invitation)->rsvp_at)
                            {{ __('Update RSVP') }}
                        @else
                            {{ __('Confirm') }}
                        @endif
                    </button>
                </div>
                @if($invitation && $invitation->is_attending)
                    <div class="col-md-4 text-md-end text-center mt-3 mt-md-0">
                        <a class="btn d-inline-flex align-items-center rounded-pill shadow-sm me-0"
                           style="background-color: #eee; height: 38px;"
                           data-bs-toggle="modal"
                           href="#qrModal">
                        <span class="d-flex justify-content-center align-items-center me-2 text-black">
                            <i class="fa-solid fa-qrcode fa-fw fa-xs"></i>
                        </span>
                            <small style="font-size: 70%;">
                                QR Invitation
                            </small>
                        </a>
                    </div>
                @endif
            </div>
        </fieldset>
        <small class="text-muted">
            <br>
            <em>
                * {!! __('rsvp_section.trouble', ['groom' => '<a href="https://wa.me/6282233662728?text='. urlencode('Hi, this is '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Kevin</a>', 'bride' => '<a href="https://wa.me/6282244872421?text='. urlencode('Hi, '. $guestName .'! I want to confirm my attendance to your wedding reception.') .'" style="color: var(--color-secondary)">Fernanda</a>']) !!}
            </em>
        </small>
    </form>
</div>
