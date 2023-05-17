<input type="number"
       name="{{ $column['origin_name'] }}"
       title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
       value="@if(isset($item)){{ $item->{$column['origin_name']} }}@else{{ '0' }}@endif"
       class="form-control form-control-sm"
       id="{{ $column['origin_name'] }}"
>
