<header class="sticky-top font-sans-serif">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:var(--color-secondary);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <small>
                    #loVINyouforeFER
                </small>
            </a>
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="fas fa-fw fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 style="background-color:var(--color-secondary)"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white h6" id="offcanvasNavbarLabel">
                        #loVINyouforeFER
                    </h5>
                    <button type="button" class="btn-close text-white" style="background: none;opacity: 1;"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fas fa-fw fa-times fa-lg"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#couple">
                                {{ __('Bride & Groom') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#save_the_date">
                                {{ __('navbar.save_the_date') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#gallery">
                                {{ __('Gallery') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#rsvp">
                                {{ __('RSVP') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#protocol">
                                {{ __('Health Protocol') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
