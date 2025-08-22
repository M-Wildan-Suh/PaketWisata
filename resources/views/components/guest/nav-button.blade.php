@props(['route', 'active'])
<a href="{{$route ?? ''}}" class="{{ $active ? 'text-byolink-1' : 'hover:text-black hover:-translate-y-1'}} text-lg font-black py-2 px-1 duration-300 relative group" aria-label="{{$slot}}">
    {{$slot}}
    <span class="{{ $active ? 'w-full' : 'w-0' }} bg-byolink-1 group-hover:w-full h-0.5 absolute bottom-0 left-0 transition-[width] duration-300"></span>
</a>