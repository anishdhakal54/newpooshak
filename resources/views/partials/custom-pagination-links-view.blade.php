@if ($paginator->hasPages())
  <ul role="navigation">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <li>
        <span class="prev disabled"><i class="icon-arrow-left"></i></span>
      </li>
      {{--<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">
                    <span class="d-none d-md-block">&lsaquo;</span>
                    <span class="d-block d-md-none">@lang('pagination.previous')</span>
                </span>
      </li>--}}
    @else

      <li class="page-item">
        <a wire:click="previousPage" class="prev" href="javascript:void(0);"><i class="icon-arrow-left"></i></a>
      </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li><a class="active disabled" href="javascript:void(0);">{{ $page }}</a></li>
          @else
            <li>
              <a  wire:click="gotoPage({{ $page }})" href="javascript:void(0);">{{ $page }}</a>
            </li>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <li>
        <a wire:click="nextPage" class="next" href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
      </li>
    @else
      <li>
        <a class="next disabled" href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
      </li>

    @endif
  </ul>
@endif