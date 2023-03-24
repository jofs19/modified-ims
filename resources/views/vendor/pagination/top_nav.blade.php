@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> --}}
                <a class="nav-link-style nav-link-light me-3 disabled" ria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="ci-arrow-left"></i>
                </a>
            @else
                {{-- <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li> --}}

                <a class="nav-link-style nav-link-light me-3" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="ci-arrow-left"></i>
                </a>
                
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                        
                            <span class="fs-md text-light active" aria-current="page"> {{ $paginator->currentPage()	 }} / {{ $paginator->lastPage() }}</span>

                        @else
                            {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                            <span class="fs-md text-light"   href="{{ $url }}"></span>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                {{-- <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> --}}

                <a class="nav-link-style nav-link-light ms-3" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="ci-arrow-right"></i>
                  </a>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>

                <a class="nav-link-style nav-link-light ms-3 disabled" haria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="ci-arrow-right"></i>
                </a>

            @endif
        </ul>
    </nav>
@endif





{{-- <div class="d-flex pb-3">

    <a class="nav-link-style nav-link-light me-3" href="#">
      <i class="ci-arrow-left"></i>
    </a>

    <span class="fs-md text-light">1 / 5</span>

    <a class="nav-link-style nav-link-light ms-3" href="#">
      <i class="ci-arrow-right"></i>
    </a>


</div> --}}