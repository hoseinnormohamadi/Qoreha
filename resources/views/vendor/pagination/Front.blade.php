@if ($paginator->hasPages())
    <div class="pagination">


        @if ($paginator->onFirstPage())



        @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prevposts-link"
                   aria-label="@lang('pagination.previous')"><i class="fas fa-caret-right"></i><span>قبلی</span></a>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a>...</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="current-page">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())

            <a href="{{ $paginator->nextPageUrl() }}" class="nextposts-link" rel="next"
               aria-label="@lang('pagination.next')"><span>بعدی</span><i class="fas fa-caret-left"></i></a>

        @else


        @endif
    </div>
@endif
