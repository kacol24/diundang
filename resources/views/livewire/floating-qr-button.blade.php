<div>
    @if($isShown)
        <div class="position-fixed" style="bottom: 15px;left: 15px;z-index:1050">
            <button class="btn d-flex align-items-center rounded-pill shadow-sm" style="background-color: #eee;"
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img src="{{ asset('storage/616467.jpg') }}" alt="qr code" class="img-fluid w-100">
                    </div>
                    <div class="modal-footer justify-content-start">
                        <small class="fst-italic">
                            Screenshot this page or save this QR Code as image.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
