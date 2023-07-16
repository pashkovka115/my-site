@extends('admin.layouts.default')

@section('title')
	Разрешения
@endsection
@section('page_header')
	Разрешения
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		{{--		@include('admin.parts.modal_settings_columns', ['route' => 'admin.category_product.columns.update'])--}}
		<!-- End Modal -->
		<a href="{{ route('admin.permission.sync') }}"
			 class="btn btn-outline-success mb-2"
			 onclick="return confirm('Потребуется редактирование ролей пользователей.')"
		>Сканировать систему и синхронизировать разрешения</a>
		<a href="{{ route('admin.permission.create') }}"
			 class="btn btn-outline-success mb-2"
		>Добавить разрешение</a>
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
								<th>ID</th>
								<th>Разрешение</th>
								<th>Описание</th>
								<th>#</th>
							</tr>
							</thead>
							<tbody>
							@foreach($items as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td title="{{ $item->name }}">{{ basename($item->name) }}</td>
									<td>{{ $item->description }}</td>
									<td>
										<a href="{{ route('admin.permission.edit', ['id' => $item->id]) }}"
											 class="btn btn-info mb-2"><i class="bi bi-pencil-square"></i></a>
										<a href="{{ route('admin.permission.destroy', ['id' => $item->id]) }}"
											 class="btn btn-danger mb-2"
											 onclick="return window.confirm('Удалить разрешение?')"><i
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
	<div class="row">
		<div class="col">{{ $items->links('vendor.pagination.bootstrap-5') }}</div>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
