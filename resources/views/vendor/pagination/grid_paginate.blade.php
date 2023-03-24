@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a>
            </li>

                {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> --}}
            @else
               
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> 
                <i class="ci-arrow-left me-2"></i>Prev</a>
            </li>


                {{-- <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li> --}}
            @endif
        </ul>


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                {{-- <li class="page-item d-sm-none disabled" aria-disabled="true"><span class="page-link page-link-static">{{ $element }}</span></li> --}}

                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                <ul class="pagination">

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">{{ $page }}<span class="visually-hidden">(current)</span></span></li>

                            {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                        @else
                        
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>

                            {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}

                        @endif

                    @endforeach
                @endif

            @endforeach
        </ul>


            {{-- Next Page Link --}}
            <ul class="pagination">

            @if ($paginator->hasMorePages())
            

              <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next" rel="next" aria-label="@lang('pagination.next')">Next<i class="ci-arrow-right ms-2"></i></a></li>

                {{-- <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> --}}
            @else
            

            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"><a class="page-link" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>

                {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> --}}

            @endif
        </ul>

    </nav>
@endif


       
