@if ($paginator->hasPages())
    <div class="dataTables_paginate paging_simple_numbers">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="paginate_button previous disabled">首页</a>
        @else
            <a class="paginate_button previous disabled" href="{{ $paginator->previousPageUrl() }}">上一页</a><span>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span>…</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="paginate_button current" data-dt-idx="1" tabindex="0">{{ $page }}</a>
                    @else
                        <a class="paginate_button previous disabled" href="{{ $url }}">{{ $page }}</a><span>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="paginate_button next disabled" href="{{ $paginator->nextPageUrl() }}">下一页</a>
        @else
            <a class="paginate_button next disabled">尾页</a>
        @endif
    </div>
@endif