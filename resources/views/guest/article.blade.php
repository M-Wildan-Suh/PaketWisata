<x-layout.guest title="Bizlink {{$page ? ' - Page ' . $page : ''}}" :category="$category">
    <div class=" w-full min-h-[calc(100vh-370px)]">
        <div class=" w-full py-6 sm:py-10 px-4 sm:px-6 space-y-8 sm:space-y-12">
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" w-full space-y-4 sm:space-y-6">
                    <div class=" w-full flex justify-between items-center">
                        <div
                            class=" w-full bg-byolink-1 p-2 text-center text-white font-semibold rounded-md text-xl">
                            {{$title}}</div>
                    </div>
                    <div class=" w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($data as $item)
                            @include('components.guest.product')
                        @endforeach
                    </div>
                    <div class=" w-full">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.guest.footer')
</x-layout.guest>