{{-- Footer --}}
<div class="w-full bg-byolink-1 text-white py-10 px-6">
    {{ $additional ?? '' }}
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            
            {{-- Left Section - Brand Info --}}
            <div class="md:w-1/3">
                <h2 class="text-3xl font-bold tracking-wide">PaketWisata</h2>
                <p class="mt-4 text-sm text-white/80">
                    PaketWisata menyediakan berbagai pilihan paket liburan terbaik dengan harga kompetitif. 
                    Kami menawarkan pengalaman wisata yang tak terlupakan dengan pelayanan profesional.
                </p>
            </div>

            {{-- Middle Section - Navigation --}}
            <div class="md:w-1/4">
                <h3 class="text-lg font-semibold mb-4">Navigasi Cepat</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('home') }}" class="hover:underline hover:text-byolink-2 transition">Beranda</a></li>
                            <li><a href="{{ route('allarticle') }}" class="hover:underline hover:text-byolink-2 transition">Artikel</a></li>
                            <li><a href="{{ request()->routeIs('business') ? route('home') : '' }}#kontak" class="hover:underline hover:text-byolink-2 transition">Kontak</a></li>
                        </ul>
                    </div>
                    <div></div>
                </div>
            </div>

            {{-- Right Section - Contact & Newsletter --}}
            <div id="kontak" class="md:w-5/12">
                <div class="flex flex-col space-y-6">
                    
                    {{-- Contact Info --}}
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Hubungi Kami</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <span>Komplek Sapta Taruna PU kujangsari blok B1 no 10, KOTA BANDUNG, BANDUNG KIDUL, JAWA BARAT, ID, 40267</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                <span>+62 857 9876 5798</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span>info@paketwisata.com</span>
                            </div>
                        </div>
                    </div>

                    {{-- Social Media --}}
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-3">Informasi Lain</h3>
                       <div class="flex space-x-4">
    <!-- WhatsApp -->
    <a href="https://wa.me/+6285798765798" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-byolink-1 hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-current"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L4 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 127.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
    </a>

    <!-- Telepon -->
    <a href="tel:+6285798765798" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-byolink-1 hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
    </a>

    <!-- Lokasi -->
    <a href="https://maps.app.goo.gl/J1eVkmTBPpgw52JH6" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-byolink-1 hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-5 h-5 fill-current"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/jasawebsite.biz/" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-byolink-1 hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-current"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
    </a>

    <!-- TikTok -->
    <a href="https://www.tiktok.com/@www.webz.biz" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-byolink-1 hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-current"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.2A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="w-full border-t border-white/30 mt-8" />

        {{-- Copyright --}}
        <div class="flex flex-col md:flex-row justify-between items-center mt-6 text-xs">
            <p>© 2025 bizlink.sites.id | All Rights Reserved</p>
            <div class="flex gap-4 mt-3 md:mt-0">
                <a href="https://jasawebsite.biz" class="hover:underline" target="_blank">Developed by Jasawebsitebiz</a>
            </div>
        </div>
    </div>
</div>
