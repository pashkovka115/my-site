<input type="file" id="{{ $column['origin_name'] }}" name="{{ $column['origin_name'] }}" class="form-control form-control-sm">
{{--Для коректного сохранения сортировки--}}
<input type="hidden" name="{{ $column['origin_name'] }}">
@isset($item)
	@if($item->{$column['origin_name']})
		<img src="/storage/{{ $item->{$column['origin_name']} }}" alt=""
				 style="width: auto; margin-top: 10px" height="150px">
		<div class="form-check" style="margin-top: 10px">
			<input name="delete_{{ $column['origin_name'] }}" class="form-check-input"
						 type="checkbox"
						 value="" id="flexCheckChecked{{ $loop->iteration }}">
			<label class="form-check-label" for="flexCheckChecked{{ $loop->iteration }}">
				Удалить изображение
			</label>
		</div>
	@endif
@endisset
