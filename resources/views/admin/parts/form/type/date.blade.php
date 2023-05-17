@if(isset($item->{$column['origin_name']}))
	<p title="{{ $column['origin_name'] }} -> {{ $column['type'] }}">{{ $item->{$column['origin_name']} }}</p>
@else
	<p title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"><?= date('Y-m-d H:i:s') ?></p>
@endif
{{-- Для коректного сохранения сортировки нужен параметр в $_POST --}}
<input type="hidden" name="{{ $column['origin_name'] }}">
