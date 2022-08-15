<header class="sticky-top font-sans-serif">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:var(--color-secondary);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#top">
                <small>
                    #loVINyouforeFER
                </small>
            </a>
            <button class="navbar-toggler border-0 text-white" type="button" id="open_nav" aria-label="open navigation">
                <i class="fas fa-fw fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 style="background-color:var(--color-secondary)"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white h5" id="offcanvasNavbarLabel">
                        #loVINyouforeFER
                    </h5>
                    <button type="button" class="btn-close text-white" style="background: none;opacity: 1;"
                            aria-label="Close" id="close_nav">
                        <i class="fas fa-fw fa-times fa-lg"></i>
                    </button>
                </div>
                <div class="offcanvas-body" id="site_nav">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#couple">
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#comments">
                                {{ __('Guest Book') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
