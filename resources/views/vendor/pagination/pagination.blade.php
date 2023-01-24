@if ($paginator->hasPages())
    <nav>
        <ul class="news_all__pagination">
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="news_all__pagination__next"rel="prev" aria-label="@lang('pagination.previous')"><i class="fa-solid fa-left-long"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="news_all__pagination__page active">{{ $page }}</a></li>
                        @else
                            <li><a class="news_all__pagination__page" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="news_all__pagination__next" rel="next" aria-label="@lang('pagination.next')"><i class="fa-solid fa-right-long"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
