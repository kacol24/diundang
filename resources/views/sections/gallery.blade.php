<div id="gallery" class="py-5">
    <div class="container">
        <div class="row grid" id="gallery_lightbox">
            @foreach([
                'ROB00520.jpg',
                'gallery.jpeg',
                'ROB00812.jpg',
                'ROB00667.jpg',
                'ROB00398.jpg',
            ] as $gallery)
                <div class="col-md-4 grid-item">
                    <figure class="figure figure-credit">
                        <a href="{{ asset('images/gallery/' . $gallery) }}"
                           class="link-secondary text-decoration-none"
                           data-fancybox="gallery"
                           data-caption='<span style="font-size: 8px">{{ __('Photo by') }} - <a href="https://www.instagram.com/explore/tags/summerstoryrobert/" target="_blank" class="link-light">#summerstoryrobert</a></span>'>
                            <img src="{{ asset('images/gallery/' . $gallery) }}"
                                 class="img-fluid w-100 figure-img m-0" alt="gallery image {{ $loop->iteration }}">
                        </a>
                        <figcaption class="figure-caption" style="font-size: 8px;">
                            {{ __('Photo by') }} - <a href="https://www.instagram.com/explore/tags/summerstoryrobert/"
                                          target="_blank"
                                          class="link-secondary">#summerstoryrobert</a>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('after_scripts')
    <script>
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item'
        });
        $grid.imagesLoaded().progress(function() {
            $grid.masonry('layout');
        });
    </script>
@endpush
