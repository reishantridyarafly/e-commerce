@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a href="#!" rel="prev"><i class="far fa-angle-double-left"></i></a>
            </li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="far fa-angle-double-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li><span>{{ $page }}</span></li> --}}
                        <li><a class="current_page" href="#!">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="far fa-angle-double-right"></i></a>
            </li>
        @else
            <li><a href="#!" rel="next"><i class="far fa-angle-double-right"></i></a>
            </li>
        @endif
    </ul>
@endif
