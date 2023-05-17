<select id="{{ $column['origin_name'] }}"
        name="{{ $column['origin_name'] }}"
        title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
        class="form-select form-select-sm"
        aria-label="Default select example">
  @for($i = 1; $i <= 6; $i++)
    <option value="h{{ $i }}"
            @if(isset($item))
              @if($item->{$column['origin_name']} == "h$i") selected @endif
            @elseif($i == 2)
              selected
        @endif
    >
      h{{ $i }}</option>
  @endfor
</select>
