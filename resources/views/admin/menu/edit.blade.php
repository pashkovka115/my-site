@extends('admin.layouts.default')

@section('title')
	Редактируем меню
@endsection
@section('page_header')
	Редактируем меню
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line"></div>
	<div class="py-2">
		<form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post">
			@csrf
			<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-1">
						<div class="card">
							<div class="card-body category-product-property">
								<label class="form-label" title="Произвольно">Название
									<input type="text" name="name" class="form-control"
												 value="{{ $menu->name }}">
								</label>
								<br>
							</div>
						</div>
					</div>
			</div>
			<div class="">
				<div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
					<button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
{{--					<button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>--}}
					<button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
