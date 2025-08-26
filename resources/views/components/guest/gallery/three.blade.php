<div class=" w-full max-w-[600px] mx-auto">
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-4 rounded-md overflow-hidden">
        @foreach ($data->articleshowgallery as $item)
            <div class=" w-full aspect-[4/3] rounded-md overflow-hidden relative">
                <a data-fancybox="gallery" aria-label="Gallery" href="{{asset('storage/images/article/gallery/'. $item->image)}}" class="">
                    <img src="{{asset('storage/images/article/gallery/'. $item->image)}}" class=" w-full h-full object-cover" alt="flex w-full aspect-[4/3] overflow-hidden">
                </a>
            </div>
        @endforeach
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Fancybox.bind("[data-fancybox]", {});
            });
        </script>
    </div>
</div>