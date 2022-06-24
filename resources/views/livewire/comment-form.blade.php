<form class="mt-5"
      wire:submit.prevent="save">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Name" aria-label="Name" required
               wire:model.defer="name">
    </div>
    <div class="mb-3">
        <textarea class="form-control" placeholder="Write message" aria-label="Write message" rows="5" required
                  wire:model.defer="message"></textarea>
    </div>
    <div class="text-center">
        <button class="btn btn-secondary text-uppercase" type="submit">
            Send Wish
        </button>
    </div>
</form>
