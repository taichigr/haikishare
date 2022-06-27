@if ($paginator->hasPages())
<nav class="c-pagination__wrap">
    <ul class="c-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="c-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="c-pagination__link" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="c-pagination__item">
            <a class="c-pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="c-pagination__item disabled" aria-disabled="true"><span class="c-pagination__link">{{ $element
                }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="c-pagination__item is-active" aria-current="page"><span class="c-pagination__link">{{ $page }}</span>
        </li>
        @else
        <li class="c-pagination__item"><a class="c-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="c-pagination__item">
            <a class="c-pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
        @else
        <li class="c-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="c-pagination__link" aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif