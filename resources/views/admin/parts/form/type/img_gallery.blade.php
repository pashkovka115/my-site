<input type="file"
       id="{{ $column['origin_name'] }}"
       name="{{ $column['origin_name'] }}[]"
       title="{{ $column['origin_name'] }}[] -> {{ $column['type'] }}"
       class="form-control form-control-sm"
       multiple>
{{--Для коректного сохранения сортировки--}}
<input type="hidden" name="{{ $column['origin_name'] }}">
@isset($item->gallery)
  <div class="row">
    @foreach($item->gallery as $img)
      <div class="col-2 mt-2 mx-3">
        <img src="/storage/{{ $img->src }}" alt=""
             style="width: auto; height: 110px">
        <div class="form-check" style="margin-top: 10px">
          <input name="delete_gallery[]" class="form-check-input"
                 type="checkbox"
                 value="{{ $img->src }}"
                 id="flexCheckChecked{{ $loop->iteration }}">
          <label class="form-check-label"
                 for="flexCheckChecked{{ $loop->iteration }}">
            Удалить изображение
          </label>
        </div>
      </div>
    @endforeach
  </div>
@endisset
