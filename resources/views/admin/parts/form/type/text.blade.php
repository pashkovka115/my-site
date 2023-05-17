<textarea id="{{ $column['origin_name'] }}"
          name="{{ $column['origin_name'] }}"
          title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
          class="form-control form-control-sm mcetxt"
          rows="3"
>@isset($item){{ $item->{$column['origin_name']} }}@endisset</textarea>
