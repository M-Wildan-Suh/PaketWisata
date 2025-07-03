<div class=" w-full">
    <div class=" w-full gap-4 sm:gap-6">
        {{-- Banner Kiri --}}
        <div class=" swiper w-full h-[calc(50vh-70px)] sm:h-[calc(100vh-70px)] overflow-hidden relative">
            <div class="swiper-wrapper">
                <div class=" swiper-slide w-full h-full overflow-hidden relative">
                    <div class=" absolute inset-0 ">
                        <img src="https://cdn.zekkei-japan.jp/images/articles/8dd671dbbbdeca91ca1ef59dca6f96e2.jpg" class=" w-full h-full object-cover" alt="">
                    </div>
                    <div class=" w-full h-full bg-black/20 relative flex items-center justify-center">
                        <div class=" space-y-4 text-white text-center">
                            <p class=" text-3xl sm:text-6xl font-black uppercase">Jelajahi Dunia</p>
                            <p class=" text-sm sm:text-base">Temukan tempat-tempat menakjubkan yang belum pernah kamu bayangkan sebelumnya.</p>
                        </div>
                    </div>
                </div>
                <div class=" swiper-slide w-full h-full overflow-hidden relative">
                    <div class=" absolute inset-0 ">
                        <img src="https://smpn5.bimakota.sch.id/upload/kontent/1683697362_770dcbd4cfbcaa9770d3.jpg" class=" w-full h-full object-cover" alt="">
                    </div>
                    <div class=" w-full h-full bg-black/20 relative flex items-center justify-center">
                        <div class=" space-y-4 text-white text-center">
                            <p class=" text-3xl sm:text-6xl font-black uppercase">Liburan Impian</p>
                            <p class=" text-sm sm:text-base">Semua sudah kami siapkan — kamu tinggal menikmati setiap momennya.</p>
                        </div>
                    </div>
                </div>
                <div class=" swiper-slide w-full h-full overflow-hidden relative">
                    <div class=" absolute inset-0 ">
                        <img src="https://i2.wp.com/blog.tripcetera.com/id/wp-content/uploads/2020/10/Danau-Toba-edited.jpg" class=" w-full h-full object-cover" alt="">
                    </div>
                    <div class=" w-full h-full bg-black/20 relative flex items-center justify-center">
                        <div class=" space-y-4 text-white text-center">
                            <p class=" text-3xl sm:text-6xl font-black uppercase">Destinasi Terbaik</p>
                            <p class=" text-sm sm:text-base">Promo menarik setiap minggu untuk perjalanan hemat dan berkesan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function() {
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            speed: 500,
            allowTouchMove: false,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
        });
    });
</script>