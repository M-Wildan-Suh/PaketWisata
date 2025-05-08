<x-app-layout head="Artikel" title="Admin - Artikel">
    <div class="sm:pl-12 sm:pr-12 lg:pr-32 duration-300 pt-8 pb-20 sm:pb-8 px-4 space-y-4">
        <div class="w-full p-4 sm:p-8 bg-white rounded-md shadow-md shadow-black/20 flex flex-col gap-6">
            <div class="w-full flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class=" w-full md:w-auto grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-4">
                    <a href="{{ route('article.create') }}"
                        class=" text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        +Artikel Spintax
                    </a>
                    <a href="{{ route('article-show.create') }}"
                        class=" text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        +Artikel Unik
                    </a>
                    <a href="{{ route('source-code.index') }}"
                        class=" col-span-2 sm:col-span-1 text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        Source Code
                    </a>

                </div>

                <!-- Search -->
                <div class=" w-full md:w-auto flex flex-row font-semibold duration-300">
                    <form action="{{route('article.index')}}" class=" w-full">
                        <input type="text" placeholder="Cari Judul..." name="search" value="{{urlencode(request('search')) ?? ''}}"
                            class=" w-full text-sm sm:text-base md:w-auto py-2 px-3 border border-byolink-1 rounded-md overflow-hidden focus-within:border-byolink-3 font-normal">
                    </form>
                </div>
            </div>
            <table class="w-full max-w-full text-sm sm:text-base rounded-md">
                <thead>
                    <tr class="h-10 bg-byolink-1 text-white divide-x-2 divide-white">
                        <th class=" w-10 px-2 py-1 rounded-tl-md">No</th>
                        <th class=" px-1 sm:px-2 py-1">Judul</th>
                        <th class=" px-1 sm:px-2 py-1 w-[90px] sm:w-[100px] rounded-tr-md">Opsi</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    @php
                        $rowBg = $loop->even ? 'bg-neutral-100' : 'bg-neutral-200';
                    @endphp
                    <tbody x-data="{ spin: false }">
                        <tr class="{{ $rowBg }} h-10 text-neutral-600 divide-x-2 divide-white">
                            <td class="px-3 py-1 text-center font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-2 sm:px-4 py-1 min-h-10 font-semibold">
                                @if ($item->article_type === 'unique')
                                    <a href="{{ route('business', ['slug' => $item->articleshow->first()->slug]) }}">
                                        <p class="line-clamp-2">{{$item->judul}}</p>
                                    </a>
                                @else
                                    <p class=" w-44 sm:w-auto line-clamp-2">{{$item->judul}}</p>
                                @endif
                            </td>
                            <td class="px-1 sm:px-2">
                                <div class="flex gap-1 sm:gap-2 justify-center">
                                    @if ($item->article_type === 'spintax')
                                        {{-- Article Generated --}}
                                        <button @click="spin = !spin" :class="spin ? 'rotate-180' : ''" class="w-5 h-5 hover:text-blue-500 duration-300 relative">
                                            <svg fill="none" viewBox="0 0 24 24" class=" w-full h-full" xmlns="http://www.w3.org/2000/svg">
                                                <path clip-rule="evenodd"
                                                    d="M20.05 17.65a3 3 0 0 0 1.2-2.4v-11a3 3 0 0 0-3-3h-12a3 3 0 0 0-3 3v11a3 3 0 0 0 1.2 2.4l6 4.5a3 3 0 0 0 3.6 0l6-4.5Z"
                                                    fill="currentColor" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>

                                        {{-- Edit --}}
                                        <div class="relative" x-data="{ open: false, generatemodal:false }">
                                            <button @click="open = !open" class="w-5 h-5 hover:text-green-500 duration-300">
                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            
                                            <div x-show="open" @click.outside="open = false" class="absolute z-10 mt-1 right-0 bottom-0 bg-white border rounded shadow-lg w-32">
                                                <a href="{{ route('article.show', ['article' => $item->id]) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>
                                                <button @click="generatemodal = !generatemodal" class=" w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Generate</button>
                                            </div>

                                            <x-admin.component.generatemodal :title="$item->judul" :route="route('article.generate', ['id' => $item->id])"/>
                                        </div>

                                        {{-- Delete --}}
                                        <div class=" relative" x-data="{ open: false, deletemodal: false, deletegeneratemodal: false }">
                                            <button @click="open = !open"
                                                class="w-5 h-5 hover:text-red-500 duration-300 relative">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                    fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            <div x-show="open" @click.outside="open = false" class="absolute z-30 mt-1 right-0 bottom-0 bg-white border rounded shadow-lg w-52">
                                                <button  @click="deletegeneratemodal = !deletegeneratemodal" class=" w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Delete Generate Artikel</button>
                                                <button @click="deletemodal = !deletemodal" class="w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Delete Artikel</button>
                                                
                                                <div x-show="deletegeneratemodal"
                                                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-40">
                                                    <div class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
                                                        <button @click="deletegeneratemodal = false"
                                                            class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                                                            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 512 512">
                                                                <path
                                                                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                                                                    fill="currentColor" class="fill-000000"></path>
                                                            </svg>
                                                        </button>
                                                        <div class=" pt-6 pb-3 bg-byolink-1 text-white">
                                                            <h2 class=" px-6 text-2xl font-bold">Tentunkan jumlah artikel yang akan di hapus</h2>
                                                        </div>
                                                        <form action="{{ route('article.generate.destroy', ['id' => $item->id]) }}`" method="POST"
                                                            class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class=" px-6 pb-4">
                                                                <x-admin.component.numberinput title="Artikel yang di hapus akan di ambil dari artikel terlama yang disimpan" placeholder="Masukkan jumlah artikel yang akan di hapus" :value="''" name="total" />
                                                            </div>
                                                            <div class="flex justify-end space-x-4 px-6">
                                                                <button @click="deletegeneratemodal = false" type="button"
                                                                    class="px-4 py-2 text-sm sm:text-base bg-neutral-600 duration-300 hover:bg-byolink-1 text-white rounded-md">Cancel</button>
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-500 duration-300 hover:bg-red-900 text-white rounded">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <x-admin.component.deletemodal :title="$item->judul" :route="route('article.destroy', ['article' => $item->id])"/>
                                            </div>
                                        </div>
                                    @elseif ($item->article_type === 'unique')
                                        {{-- Edit --}}
                                        <a href="{{ route('article-show.show', [ 'article_show' => $item->articleshow->first()->id ]) }}"
                                            class="w-5 h-5 hover:text-green-500 duration-300">
                                            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <div x-data="{ deletemodal:false }">
                                            <button @click="deletemodal = !deletemodal"
                                                class=" w-4 sm:w-5 aspect-square hover:text-red-500 duration-300">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                        fill="currentColor" class="fill-000000"></path>
                                                </svg>
                                            </button>
                                            <x-admin.component.deletemodal :title="$item->judul" :route="route('article.destroy', ['article' => $item->id])"/>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        @if ($item->article_type === 'spintax')
                            @foreach ($item->articleshow as $itemshow)
                                <tr x-show="spin" class="{{ $itemshow->status === 'schedule' ? 'bg-red-100' : ($itemshow->status === 'publish' ? 'bg-green-100' : 'bg-purple-100') }} h-10 text-neutral-600 divide-x-2 divide-white">
                                    <td class="px-3 py-1 text-center font-semibold bg-white"></td>
                                    <td class="px-2 sm:px-4 py-1 min-h-10 font-semibold flex">
                                        <p class="line-clamp-2">
                                            <a href="{{ route('business', ['slug' => $itemshow->slug]) }}">{{$itemshow->judul}}</a>
                                        </p>
                                    </td>
                                    <td class="px-1 sm:px-2">
                                        <div class="flex gap-1 sm:gap-2 justify-center">
                                            <!-- Edit -->
                                            <a href="{{ route('article-generated.show', ['article_generated' => $itemshow->id]) }}"
                                                class="w-5 h-5 hover:text-green-500 duration-300">
                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </a>
                    
                                            <!-- Delete -->
                                            <div x-data="{ deletemodal:false }">
                                                <button @click="deletemodal = !deletemodal"
                                                    class="w-5 h-5 hover:text-red-500 duration-300">
                                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                        fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                                <x-admin.component.deletemodal :title="$itemshow->judul" :route="route('article-show.destroy', ['article_show' => $itemshow->id])"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                @endforeach
            </table>
            {{ $data->links('vendor.pagination.admin') }}
        </div>
    </div>

    @include('components.admin.component.success')
</x-app-layout>
