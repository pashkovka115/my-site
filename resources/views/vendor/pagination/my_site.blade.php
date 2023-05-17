@if ($paginator->hasPages())
  <div class="row">
    <div class="col-12">
      <div class="pagination-content-wrap">
        <nav class="pagination-nav">
          <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
              <li><a class="disabled active prev" href="#/"><i class="fa fa-angle-left"></i>@lang('pagination.previous')
                </a></li>
            @else
              <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; @lang('pagination.previous')</a>
              </li>
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
                    <li><a class="disabled" href="#/">{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach
              @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
              <li><a class="next" href="{{ $paginator->nextPageUrl() }}">@lang('pagination.next')<i
                      class="fa fa-angle-right"></i></a></li>
            @else
              <li><a class="disabled next" href="#/">@lang('pagination.next') <i class="fa fa-angle-right"></i></a></li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </div>
@endif
