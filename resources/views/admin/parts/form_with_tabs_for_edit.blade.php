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
@include('admin.parts.buttons_three')
