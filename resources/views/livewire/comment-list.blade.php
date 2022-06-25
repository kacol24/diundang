<div>
    <div class="list-group mt-5" style="max-height: 500px; overflow-y: auto;"
         wire:poll>
        @forelse($comments as $comment)
            <div class="mb-4 mb-md-5">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 h6">
                        {{ $comment->name }}
                    </h5>
                    <small>
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
                <small class="mb-1">
                    {!! $comment->message !!}
                </small>
            </div>
        @empty
            <em>
                Be the first to leave a wish
            </em>
        @endforelse
    </div>

</div>
