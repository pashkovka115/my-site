<select id="{{ $column['origin_name'] }}" name="{{ $column['origin_name'] }}" class="form-select form-select-sm"
        aria-label="Default select example">
    @for($i = 1; $i <= 6; $i++)
        <option value="h{{ $i }}"
                @isset($item)
                    @if($item->{$column['origin_name']} == "h$i") selected @endif
            @endisset
        >
            h{{ $i }}</option>
    @endfor
</select>
