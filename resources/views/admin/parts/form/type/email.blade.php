<input type="email" name="{{ $column['origin_name'] }}"
       value="@isset($item){{ $item->{$column['origin_name']} }}@endisset"
       class="form-control form-control-sm"
       id="{{ $column['origin_name'] }}"
>
