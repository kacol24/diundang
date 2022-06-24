<div style="background-color:var(--color-primary);" class="py-5 text-white">
    <div class="container py-5 my-5">
        <h2 class="font-serif h3 text-center text-uppercase">
            {{ __('Guestbook') }}
        </h2>
        <small class="d-block fst-italic mb-5 mb-md-0 text-center">
            Leave your wishes here
        </small>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <livewire:comment-form/>
                <livewire:comment-list/>
            </div>
        </div>
    </div>
</div>
