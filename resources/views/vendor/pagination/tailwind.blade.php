@if ($paginator->hasPages())
    <div class="flex justify-center items-center gap-3 mt-14">
        
        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <button disabled class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center cursor-default">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center hover:bg-green-700">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center cursor-default">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- Halaman Aktif (Warna Hijau Kustom) --}}
                        <button disabled class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center cursor-default">
                            {{ $page }}
                        </button>
                    @else
                        {{-- Halaman Tidak Aktif (Warna Abu-abu Kustom) --}}
                        <a href="{{ $url }}" class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center hover:bg-gray-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center hover:bg-green-700">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        @else
            <button disabled class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center cursor-default">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        @endif
    </div>
@endif