<x-layout.guest title="Bizlink" :category="$category">
    <div class=" w-full min-h-[calc(100vh-370px)]">
        <div class=" w-full pb-6 sm:pb-10 space-y-8 sm:space-y-12">
            @include('components.guest.home.header')
            <div class=" w-full px-4 sm:px-6">
                <div class=" w-full max-w-[1080px] mx-auto">
                    <div class=" md:col-span-3 w-full space-y-4 sm:space-y-6">
                        <div class=" w-full flex justify-between items-center">
                            <div
                                class=" w-full bg-byolink-1 p-2 text-center text-white font-semibold rounded-md text-xl">
                                Artikel Terpopuler</div>
                        </div>
                        <div class=" slider w-full overflow-hidden rounded-md relative">
                            <div class="swiper-wrapper">
                                @foreach ($trend as $item)
                                    <div class="swiper-slide">
                                        @include('components.guest.product')
                                    </div>
                                @endforeach
                            </div>
                            <div class="next absolute right-0 top-1/2 -translate-y-1/2 p-2 bg-black/50 text-white z-30 rounded-l-md">
                                <div class=" w-4 sm:w-6 aspect-square overflow-hidden">
                                    <svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg"><title/><path fill="currentColor" d="M69.8437,43.3876,33.8422,13.3863a6.0035,6.0035,0,0,0-7.6878,9.223l30.47,25.39-30.47,25.39a6.0035,6.0035,0,0,0,7.6878,9.2231L69.8437,52.6106a6.0091,6.0091,0,0,0,0-9.223Z"/></svg>
                                </div>
                            </div>
                            <div class="next absolute left-0 top-1/2 -translate-y-1/2 p-2 bg-black/50 text-white z-30 rounded-l-md">
                                <div class=" w-4 sm:w-6 aspect-square overflow-hidden">
                                    <svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg"><title/><path fill="currentColor" d="M39.3756,48.0022l30.47-25.39a6.0035,6.0035,0,0,0-7.6878-9.223L26.1563,43.3906a6.0092,6.0092,0,0,0,0,9.2231L62.1578,82.615a6.0035,6.0035,0,0,0,7.6878-9.2231Z"/></svg>
                                </div>
                            </div>
                        </div>
                        <script>
                            window.addEventListener('load', function() {
                                const swiper = new Swiper('.slider', {
                                    direction: 'horizontal',
                                    loop: true,
                                    speed: 500,
                                    slidesPerView: 2,
                                    spaceBetween: 16,
                                    navigation: {
                                        nextEl: '.next',
                                        prevEl: '.prev',
                                    },
                                    breakpoints: {
                                        640: {
                                        slidesPerView: 4,
                                        spaceBetween: 16
                                        }
                                    },
                                    autoplay: {
                                        delay: 6000,
                                        disableOnInteraction: false,
                                    },
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class=" w-full px-4 sm:px-6">
                <div class=" w-full max-w-[1080px] mx-auto">
                    <div class=" md:col-span-3 w-full space-y-4 sm:space-y-6">
                        <div class=" w-full flex justify-between items-center">
                            <div
                                class=" w-full bg-byolink-1 p-2 text-center text-white font-semibold rounded-md text-xl">
                                Artikel Terbaru</div>
                        </div>
                        <div class=" w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($data->take(4) as $item)
                                @include('components.guest.product')
                            @endforeach
                        </div>
                        <div class=" w-full flex justify-end">
                            <a href="{{ route('allarticle') }}">
                                <button
                                    class=" px-4 py-2 flex items-center gap-1 border rounded-full text-nowrap text-xs text-neutral-600 border-neutral-600 hover:text-byolink-1 hover:border-byolink-1 duration-300">
                                    <p>Lihat Lainnya</p>
                                    <div class=" w-3 aspect-square">
                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 9a1 1 0 0 0 0 1.42l4.6 4.6H3.06a1 1 0 1 0 0 2h23.52L22 21.59A1 1 0 0 0 22 23a1 1 0 0 0 1.41 0l6.36-6.36a.88.88 0 0 0 0-1.27L23.42 9A1 1 0 0 0 22 9Z"
                                                data-name="Layer 2" fill="currentColor" class="fill-000000"></path>
                                        </svg>
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($category as $cat)
                <div class=" w-full px-4 sm:px-6">
                    <div class=" w-full max-w-[1080px] mx-auto">
                        <div class=" md:col-span-3 w-full space-y-4 sm:space-y-6">
                            <div class=" w-full flex justify-between items-center">
                                <div
                                    class=" w-full bg-byolink-1 p-2 text-center text-white font-semibold rounded-md text-xl">
                                    Kategori : {{ $cat->category }}</div>
                            </div>
                            <div class=" w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($cat->articles as $item)
                                    @include('components.guest.product')
                                @endforeach
                            </div>
                            <div class=" w-full flex justify-end">
                                <a href="{{ route('category', ['category' => $cat->slug]) }}">
                                    <button
                                        class=" px-4 py-2 flex items-center gap-1 border rounded-full text-nowrap text-xs text-neutral-600 border-neutral-600 hover:text-byolink-1 hover:border-byolink-1 duration-300">
                                        <p>Lihat Lainnya</p>
                                        <div class=" w-3 aspect-square">
                                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22 9a1 1 0 0 0 0 1.42l4.6 4.6H3.06a1 1 0 1 0 0 2h23.52L22 21.59A1 1 0 0 0 22 23a1 1 0 0 0 1.41 0l6.36-6.36a.88.88 0 0 0 0-1.27L23.42 9A1 1 0 0 0 22 9Z"
                                                    data-name="Layer 2" fill="currentColor" class="fill-000000"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.guest.footer')
</x-layout.guest>
