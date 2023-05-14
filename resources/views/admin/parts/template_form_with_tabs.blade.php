<ul class="nav nav-line-bottom nav-example" id="pills-tabTwo" role="tablist">
	@foreach($tabs as $tab)
		@if($tab['is_show'])
			<li class="nav-item">
				<a class="nav-link @if($loop->first) active @endif" id="pills-accordions-design-tab{{ $loop->iteration }}"
					 data-bs-toggle="pill"
					 href="#pills-accordions-design{{ $loop->iteration }}" role="tab"
					 aria-controls="pills-accordions-design{{ $loop->iteration }}"
					 aria-selected="true">{{ $tab['name'] }}</a>
			</li>
		@endif
	@endforeach
</ul>

<div class="tab-content py-4" id="pills-tabTwoContent">
	@foreach($tabs as $tab)
		@if($tab['is_show'])
			<div class="tab-pane tab-example-design fade show @if($loop->first) active @endif"
					 id="pills-accordions-design{{ $loop->iteration }}"
					 role="tabpanel" aria-labelledby="pills-accordions-design-tab{{ $loop->iteration }}">
				@include('admin.parts.form_edit', ['columns' => $tab['columns'], 'item' => $item])
			</div>
		@endif
	@endforeach
</div>
<div class="">
	<div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
		<button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
		<button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>
		<button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование
		</button>
	</div>
</div>
