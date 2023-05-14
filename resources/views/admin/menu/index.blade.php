@extends('admin.layouts.default')

@section('title')
	Меню
@endsection
@section('page_header')
	Меню
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPropertyModalCenter">
			Добавить меню
		</button>
	</div>
	<div class="py-2">
		<!-- row -->
		<div class="row my-row">
			<div class="bg-white">
				<div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
						 role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
					<div class="table-responsive">
						<table class="table table-bordered my-table">
							<thead>
							<tr>
								<th>Название</th>
								<th>Действия</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($menus as $menu)
								<tr>
									<td><a href="{{ route('admin.menu_item.edit', ['id' => $menu->id]) }}">{{ $menu->name }}</a></td>
									<td>
											<a href="{{ route('admin.menu.edit', ['id' => $menu->id]) }}"
												 class="btn btn-info mb-2"><i class="bi bi-pencil-square"></i></a>
											<a href="{{ route('admin.menu.destroy', ['id' => $menu->id]) }}"
												 class="btn btn-danger mb-2"
												 onclick="return window.confirm('Удалить меню и все вложенные элементы?')"><i
														class="bi bi-trash"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

{{--	Modal --}}
	<div class="modal fade" id="addPropertyModalCenter" tabindex="-1" role="dialog" aria-labelledby="addPropertyModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addPropertyModalCenterTitle">Новое меню</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"></span>
					</button>
				</div>
				<form action="{{ route('admin.menu.store') }}" method="post">
					@csrf
					<div class="modal-body">
						<div class="card-body category-product-property">
							<label class="form-label" title="Произвольно">Название
								<input type="text" name="name" class="form-control" value="">
							</label>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
						<button type="submit" class="btn btn-primary">Сохранить</button>
					</div>
				</form>
			</div>
		</div>
	</div>
{{-- End	Modal --}}
@endsection
