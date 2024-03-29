<div>
    <div class="list-group mt-5"
         @if($comments->count())
             wire:poll.{{ 5 * 1000 }}ms.visible
         @endif
         style="max-height: 500px; overflow-y: auto;">
        @forelse($comments as $comment)
            <div class="mb-4 mb-md-5">
                <div class="d-flex w-100 justify-content-between">
                    <div class="mb-1 h6">
                        {{ $comment->name }}
                    </div>
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
