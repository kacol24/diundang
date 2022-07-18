<div>
    @if($isShown)
        <div class="position-fixed" style="bottom: 15px;left: 15px;z-index:1050">
            <button class="btn d-flex align-items-center rounded-pill shadow-sm" style="background-color: #eee; height: 40px;"
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
    @endif
</div>
