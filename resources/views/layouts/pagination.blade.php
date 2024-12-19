<div>
    @if (method_exists($pagination, 'links'))
        @if ($pagination->lastPage() > 3)
            <ul class="pagination">
                @if ($pagination->currentPage() > 1)
                    <li><a href="{{ $pagination->url($pagination->currentPage() - 1) }}">Previous</a></li>
                @endif

                @for ($i = 1; $i <= 3; $i++)
                    <li class="{{ $pagination->currentPage() == $i ? 'active' : '' }}">
                        <a href="{{ $pagination->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($pagination->currentPage() < $pagination->lastPage())
                    <li><a href="{{ $pagination->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        @else
            {{ $pagination->links() }}
        @endif
    @endif
</div>