@if(isset($item))
	<p title="{{ $column['origin_name'] }} -> {{ $column['type'] }}">{{ $item->{$column['origin_name']} }}</p>
@endif
{{-- Для коректного сохранения сортировки нужен параметр в $_POST --}}
<input type="hidden" name="{{ $column['origin_name'] }}">
