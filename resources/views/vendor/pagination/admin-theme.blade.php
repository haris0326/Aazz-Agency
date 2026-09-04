{{--
    Path: resources/views/vendor/pagination/admin-theme.blade.php
    Custom pagination matching the admin design system.
    Used via: $paginator->links('vendor.pagination.admin-theme')
    (table-footer.blade.php already calls this — no extra setup needed elsewhere.)
--}}
@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="ap-pagination">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="ap-page-item disabled"><span class="ap-page-link"><i class="bi bi-chevron-left"></i></span></li>
            @else
                <li class="ap-page-item">
                    <a class="ap-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Page numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="ap-page-item disabled"><span class="ap-page-link ap-page-dots">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="ap-page-item active"><span class="ap-page-link">{{ $page }}</span></li>
                        @else
                            <li class="ap-page-item">
                                <a class="ap-page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="ap-page-item">
                    <a class="ap-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="ap-page-item disabled"><span class="ap-page-link"><i class="bi bi-chevron-right"></i></span></li>
            @endif
        </ul>
    </nav>
@endif