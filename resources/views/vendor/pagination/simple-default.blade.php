{{-- FILE: resources/views/vendor/pagination/simple-default.blade.php --}}
@if ($paginator->hasPages())
<nav style="display:flex;justify-content:center;gap:6px;margin-top:20px">
    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px">&laquo;</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none">&laquo;</a>
    @endif

    {{-- Page Numbers --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span style="padding:8px 14px;border-radius:8px;background:var(--teal);color:#fff;font-size:14px;border:1.5px solid var(--teal)">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none">&raquo;</a>
    @else
        <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px">&raquo;</span>
    @endif
</nav>
@endif
