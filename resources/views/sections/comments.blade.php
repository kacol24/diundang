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
                <form action="" class="mt-5">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                    </div>
                    <div class="mb-3">
                <textarea class="form-control" placeholder="Write message" aria-label="Write message"
                          rows="5"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-secondary text-uppercase" type="submit">
                            Send Wish
                        </button>
                    </div>
                </form>
                <div class="list-group mt-5" style="max-height: 500px; overflow-y: auto;">
                    @foreach(range(1, 100) as $comment)
                        <div class="mb-4 mb-md-5">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 h6">
                                    Rosalinda
                                </h5>
                                <small>5 minutes ago</small>
                            </div>
                            <small class="mb-1">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto cupiditate
                                distinctio
                                eligendi eveniet harum illo maiores, necessitatibus officiis omnis reiciendis repellat
                                suscipit?
                                Commodi doloribus in nostrum temporibus vero?
                            </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
