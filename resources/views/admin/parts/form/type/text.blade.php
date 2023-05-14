<textarea id="{{ $lang_name ?? $column['origin_name'] }}"
          name="{{ $lang_name ?? $column['origin_name'] }}"
          class="form-control form-control-sm mcetxt"
          rows="3"
>@isset($item){{ $item->{$column['origin_name']} }}@endisset</textarea>
