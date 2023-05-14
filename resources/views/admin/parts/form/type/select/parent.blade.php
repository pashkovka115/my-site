<select id="{{ $column['origin_name'] }}" name="{{ $column['origin_name'] }}" class="form-select form-select-sm">
  <option value="">Без родителя</option>
  @if(isset($items))
    @foreach($items as $obj)
      <option value="{{ $obj->id }}"
      @isset($item)
        @selected($obj->id == $item->parent_id)
          @endisset
      >{{ $obj->baseLang->name }}</option>
    @endforeach
  @endif
</select>
