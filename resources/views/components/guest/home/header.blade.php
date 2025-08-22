<div class="w-full">
    <div class="w-full gap-4 sm:gap-6">
        <!-- Banner Slider -->
        <div class="responsive-banner w-full overflow-hidden relative rounded-xl shadow-xl mx-auto"
            style="max-width:1080px; height:300px; margin-top:20px; border-radius:16px;">
            <!-- Banner 1 -->
            <div
                class="banner-slide absolute w-full h-full transition-[banner] duration-800 opacity-0 translate-x-full rounded-xl overflow-hidden active">
                <div class="absolute inset-0">
                    <img src="https://cdn.zekkei-japan.jp/images/articles/8dd671dbbbdeca91ca1ef59dca6f96e2.jpg"
                        class="w-full h-full object-cover" alt="">
                </div>
                <div class="w-full h-full bg-black/20 relative flex items-center justify-center">
                    <div class="space-y-4 text-white text-center">
                        <p class="text-3xl sm:text-6xl font-black uppercase">Jelajahi Dunia</p>
                        <p class="text-sm sm:text-base">Temukan tempat-tempat menakjubkan yang belum pernah kamu
                            bayangkan sebelumnya.</p>
                    </div>
                </div>
            </div>

            <!-- Banner 2 -->
            <div
                class="banner-slide absolute w-full h-full transition-[banner] duration-800 opacity-0 translate-x-full rounded-xl overflow-hidden">
                <div class="absolute inset-0">
                    <img src="https://smpn5.bimakota.sch.id/upload/kontent/1683697362_770dcbd4cfbcaa9770d3.jpg"
                        class="w-full h-full object-cover" alt="">
                </div>
                <div class="w-full h-full bg-black/20 relative flex items-center justify-center">
                    <div class="space-y-4 text-white text-center">
                        <p class="text-3xl sm:text-6xl font-black uppercase">Liburan Impian</p>
                        <p class="text-sm sm:text-base">Semua sudah kami siapkan — kamu tinggal menikmati setiap
                            momennya.</p>
                    </div>
                </div>
            </div>


            <!-- Banner 3 -->
            <div
                class="banner-slide absolute w-full h-full transition-[banner] duration-800 opacity-0 translate-x-full rounded-xl overflow-hidden">
                <div class="absolute inset-0">
                    <img src="https://i2.wp.com/blog.tripcetera.com/id/wp-content/uploads/2020/10/Danau-Toba-edited.jpg"
                        class="w-full h-full object-cover" alt="">
                </div>
                <div class="w-full h-full bg-black/20 relative flex items-center justify-center">
                    <div class="space-y-4 text-white text-center">
                        <p class="text-3xl sm:text-6xl font-black uppercase">Destinasi Terbaik</p>
                        <p class="text-sm sm:text-base">Promo menarik setiap minggu untuk perjalanan hemat dan berkesan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 text-white p-2 rounded-full z-10 hover:bg-black/40 transition-colors"
                id="prevBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-black/30 text-white p-2 rounded-full z-10 hover:bg-black/40 transition-colors mr-4"
                id="nextBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

<style>
    .banner-slide {
        opacity: 0;
        transform: translateX(100%);
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 0;
    }

    .banner-slide.active {
        opacity: 1;
        transform: translateX(0);
        z-index: 1;
    }

    .banner-slide.leaving {
        opacity: 0;
        transform: translateX(-100%);
        z-index: 0;
    }

    .banner-slide.next {
        opacity: 0;
        transform: translateX(100%);
        z-index: 0;
    }

    .responsive-banner {
        max-width: 1020px;
        height: 300px;
        margin: 0 auto;
    }

    .banner-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const banners = document.querySelectorAll('.banner-slide');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentIndex = 0;
        let slideInterval;
        let isAnimating = false;

        const animationDuration = 800;
        const slideIntervalTime = 3000;

        function updateSlides() {
            if (isAnimating) return;
            isAnimating = true;

            banners.forEach(slide => {
                slide.classList.remove('active', 'prev', 'next', 'leaving');
            });

            // Set current slide to leaving
            banners[currentIndex].classList.add('leaving');
            banners[currentIndex].style.transform = 'translateX(-100%)';
            banners[currentIndex].style.opacity = '0';

            // Calculate next index
            currentIndex = (currentIndex + 1) % banners.length;

            // Prepare next slide
            banners[currentIndex].classList.add('next');
            banners[currentIndex].style.transition = 'none';
            banners[currentIndex].style.transform = 'translateX(100%)';
            banners[currentIndex].style.opacity = '0';

            // Force repaint
            void banners[currentIndex].offsetWidth;

            // Animate in
            banners[currentIndex].style.transition =
                `transform ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1), opacity ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1)`;
            banners[currentIndex].classList.replace('next', 'active');
            banners[currentIndex].style.transform = 'translateX(0)';
            banners[currentIndex].style.opacity = '1';

            // Reset animation flag after animation completes
            setTimeout(() => {
                isAnimating = false;
            }, animationDuration);
        }

        function goToSlide(index) {
            if (isAnimating) return;
            isAnimating = true;

            banners.forEach(slide => {
                slide.classList.remove('active', 'prev', 'next', 'leaving');
            });

            // Set current slide to leaving
            const direction = index > currentIndex ? 1 : -1;
            banners[currentIndex].classList.add('leaving');
            banners[currentIndex].style.transform = `translateX(${-100 * direction}%)`;
            banners[currentIndex].style.opacity = '0';

            // Update current index
            currentIndex = (index + banners.length) % banners.length;

            // Prepare next slide
            banners[currentIndex].classList.add('next');
            banners[currentIndex].style.transition = 'none';
            banners[currentIndex].style.transform = `translateX(${100 * direction}%)`;
            banners[currentIndex].style.opacity = '0';

            // Force repaint
            void banners[currentIndex].offsetWidth;

            // Animate in
            banners[currentIndex].style.transition =
                `transform ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1), opacity ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1)`;
            banners[currentIndex].classList.replace('next', 'active');
            banners[currentIndex].style.transform = 'translateX(0)';
            banners[currentIndex].style.opacity = '1';

            // Reset animation flag after animation completes
            setTimeout(() => {
                isAnimating = false;
            }, animationDuration);
        }

        function startSlider() {
            clearInterval(slideInterval);
            slideInterval = setInterval(() => {
                updateSlides();
            }, slideIntervalTime);
        }

        function resetTimer() {
            clearInterval(slideInterval);
            startSlider();
        }

        // Navigation buttons
        prevBtn.addEventListener('click', () => {
            goToSlide(currentIndex - 1);
            resetTimer();
        });

        nextBtn.addEventListener('click', () => {
            goToSlide(currentIndex + 1);
            resetTimer();
        });

        // Initialize the slider
        banners.forEach((slide, index) => {
            slide.style.transition =
                `transform ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1), opacity ${animationDuration}ms cubic-bezier(0.4, 0, 0.2, 1)`;
            if (index === 0) {
                slide.classList.add('active');
                slide.style.opacity = '1';
                slide.style.transform = 'translateX(0)';
            } else {
                slide.style.opacity = '0';
                slide.style.transform = 'translateX(100%)';
            }
        });

        startSlider();

        // Pause on hover
        const bannerContainer = document.querySelector('.responsive-banner');
        bannerContainer.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        bannerContainer.addEventListener('mouseleave', () => {
            startSlider();
        });
    });
</script>
