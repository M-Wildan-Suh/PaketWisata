<div x-data="{ isOpen: false }" class=" flex sm:hidden">
    <div class=" fixed bottom-4 left-0 w-full px-4 z-40">
        <div class=" w-full rounded-full bg-white shadow-md shadow-black/20 py-2 px-3 text-xs grid grid-cols-3 border border-neutral-300">
            <a href="{{route('dashboard')}}" class=" flex flex-col items-center text-byolink-1 hover:text-byolink-3 duration-300">
                <button class=" w-6 aspect-square">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16 3a13 13 0 1 0 13 13A13 13 0 0 0 16 3Zm6.69 16.91A24.39 24.39 0 0 0 23 16a23.72 23.72 0 0 0-.32-3.91C25.37 13.08 27 14.58 27 16s-1.69 3-4.31 3.91ZM5 16c0-1.47 1.69-2.95 4.31-3.91A24.39 24.39 0 0 0 9 16a23.72 23.72 0 0 0 .32 3.91C6.63 18.92 5 17.42 5 16Zm6.5-10a14.2 14.2 0 0 0-1.68 3.82A14.19 14.19 0 0 0 6 11.49 11 11 0 0 1 11.5 6ZM6 20.5a14.63 14.63 0 0 0 4.32 1.8h.09A23.4 23.4 0 0 0 16 23c.6 0 1.19 0 1.76-.06a1 1 0 1 0-.14-2Q16.83 21 16 21a20.92 20.92 0 0 1-4.52-.47A21.33 21.33 0 0 1 11 16c0-6.48 2.64-11 5-11 1 0 2 .76 2.89 2.14a1 1 0 0 0 .84.47 1 1 0 0 0 .54-.15 1 1 0 0 0 .31-1.38.86.86 0 0 0-.07-.1A11 11 0 0 1 26 11.5a14.94 14.94 0 0 0-4.48-1.84A23.21 23.21 0 0 0 16 9c-.6 0-1.19 0-1.76.06a1 1 0 1 0 .14 2Q15.18 11 16 11a20.92 20.92 0 0 1 4.52.47A21.33 21.33 0 0 1 21 16c0 6.48-2.64 11-5 11-1 0-2-.76-2.89-2.14a1 1 0 1 0-1.69 1.06.86.86 0 0 0 .07.1A11 11 0 0 1 6 20.5ZM20.5 26a14.2 14.2 0 0 0 1.68-3.85A14.19 14.19 0 0 0 26 20.51 11 11 0 0 1 20.5 26Z" data-name="world www web website" fill="currentColor" class="fill-000000"></path></svg>
                </button>
                <p>Dashboard</p>
            </a>
            <div class=" flex justify-center relative">
                <button @click="isOpen = !isOpen" class=" aspect-square rounded-full duration-300 text-white p-1.5"
                :class="isOpen ? ' bg-byolink-3 rotate-90' : 'bg-byolink-1'">
                    <svg viewBox="0 0 32 32" class=" w-auto h-auto" xmlns="http://www.w3.org/2000/svg"><path d="M12 4H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 8H6V6h6ZM26 4h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 8h-6V6h6ZM12 18H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2Zm0 8H6v-6h6ZM26 18h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2Zm0 8h-6v-6h6Z" fill="currentColor" class="fill-000000"></path><path data-name="<Transparent Rectangle>" d="M0 0h32v32H0z" fill="none"></path></svg>
                </button>
            </div>
            <form method="POST" class=" w-full" action="{{ route('logout') }}">
                <div class=" flex flex-col items-center text-byolink-1 hover:text-byolink-3 duration-300">
                    @csrf
                    <button id="logout" class=" w-6 aspect-square">
                        <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><g id="_icons"><path d="M20.9 11.6c-.1-.1-.1-.2-.2-.3l-3-3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.3 1.3H13c-.6 0-1 .4-1 1s.4 1 1 1h4.6l-1.3 1.3c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l3-3c.1-.1.2-.2.2-.3.1-.3.1-.5 0-.8z" fill="currentColor" class="fill-000000"></path><path d="M15.5 18.1c-1.1.6-2.3.9-3.5.9-3.9 0-7-3.1-7-7s3.1-7 7-7c1.2 0 2.4.3 3.5.9.5.3 1.1.1 1.4-.4.3-.5.1-1.1-.4-1.4C15.1 3.4 13.6 3 12 3c-5 0-9 4-9 9s4 9 9 9c1.6 0 3.1-.4 4.5-1.2.5-.3.6-.9.4-1.4-.3-.4-.9-.6-1.4-.3z" fill="currentColor" class="fill-000000"></path></g></svg>
                    </button>
                    <label for="logout">Logout</label>
                </div>
            </form>
        </div>
    </div>
    <div 
        class="fixed w-[calc(100vw-32px)] left-1/2 -translate-x-1/2 bg-white shadow-md shadow-black/20 bottom-[44px] rounded-t-md z-10 transition-all duration-300 overflow-hidden border border-neutral-300"
        :class="isOpen ? ' h-48 pb-7' : 'h-0'">
        <div class=" grid grid-cols-2 p-4 gap-4 text-sm">
            <x-admin.mobile-navbutton route="home" :active="'home'">
                <x-slot:svg>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                Home
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="user.index" :active="['user.index', 'article.create', 'user.show']">
                <x-slot:svg>
                    <svg fill="none" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M1.5 0A1.5 1.5 0 0 0 0 1.5v12A1.5 1.5 0 0 0 1.5 15h12a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 13.5 0h-12Zm5 9A3.5 3.5 0 0 0 3 12.5v1a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-1A3.5 3.5 0 0 0 8.5 9h-2ZM5 5.5a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                </x-slot:svg>
                User
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="template.index" :active="['template.index', 'template.create', 'template.show']">
                <x-slot:svg>
                    <svg viewBox="-265 388.9 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        enable-background="new -265 388.9 64 64">
                        <path
                            d="M-210.6 410.9h-44.8c-.9 0-1.6-.7-1.6-1.6v-9.2c0-.9.7-1.6 1.6-1.6h44.8c.9 0 1.6.7 1.6 1.6v9.2c0 .9-.7 1.6-1.6 1.6zM-210.6 443.3h-11.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h11.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6zM-229.6 443.3h-25.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h25.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </x-slot:svg>
                Template
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="phone-number.index" :active="['phone-number.index', 'phone-number.create', 'phone-number.show']">
                <x-slot:svg>
                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.7-64-64-64zm-32.4 289.5-11.62 50.39c-1.633 7.125-7.9 12.11-15.24 12.11-126.1 0-228.7-102.6-228.7-228.8 0-7.328 4.984-13.59 12.11-15.22l50.38-11.63c7.344-1.703 14.88 2.109 17.93 9.062l23.27 54.28a15.642 15.642 0 0 1-4.492 18.22L168.3 232c16.99 34.61 45.14 62.75 79.77 79.75l22.02-26.91c4.344-5.391 11.85-7.25 18.24-4.484l54.24 23.25c6.93 2.994 10.73 10.594 9.03 17.894z" fill="currentColor" class="fill-000000"></path></svg>
                </x-slot:svg>
                Phone
            </x-admin.mobile-navbutton>
            <x-admin.mobile-navbutton route="article.index" :active="['article.index', 'article.create', 'article.show', 'articel-show.create', 'article-show.create', 'article-show.show', 'article.spintax', 'article.unique', 'article.filter', 'article.spintax.filter', 'article.unique.filter']">
                <x-slot:svg>
                    <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M8 28h8v-8H8v8zm0 10h8v-8H8v8zm0-20h8v-8H8v8zm10 10h24v-8H18v8zm0 10h24v-8H18v8zm0-28v8h24v-8H18z" fill="currentColor" class="fill-000000"></path><path d="M0 0h48v48H0z" fill="none"></path></svg>
                </x-slot:svg>
                Article
            </x-admin.mobile-navbutton>
        </div>
    </div>
</div>