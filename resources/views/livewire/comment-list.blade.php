<div class="list-group mt-5" style="max-height: 500px; overflow-y: auto;"
     wire:poll.{{ 5 * 1000 }}ms.visible>
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
