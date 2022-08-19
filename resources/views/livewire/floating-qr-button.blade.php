<div>
    @if($isShown)
        <div class="position-fixed" style="bottom: 15px;left: 15px;z-index:1050">
            <button class="btn d-flex align-items-center rounded-pill shadow-sm"
                    style="background-color: #eee; height: 40px;"
                    data-bs-toggle="modal"
                    data-bs-target="#qrModal">
                <span class="d-flex justify-content-center align-items-center me-2 text-black">
                    <i class="fa-solid fa-qrcode fa-fw fa-xs"></i>
                </span>
                <small style="font-size: 70%;">
                    QR Invitation
                </small>
            </button>
        </div>
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
    @endif
</div>
